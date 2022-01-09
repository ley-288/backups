<?php
namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryImage;
use App\Models\StorySave;
use App\Models\StorySend;
use App\Models\Auth\User;
use App\Models\App\Dettagli;
use App\Models\App\Categorie;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;
use View;
use Intervention\Image\Facades\Image;
use Embera\Embera;
use Carbon\Carbon;



class StoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function delete(Request $request){

        $response = array();
        $response['code'] = 400;

        $story = Story::find($request->input('id'));

        if ($story){
            
        }

        return Response::json($response);
    }


    public function create(Request $request){
    	//$st = Story::all();dd($st);
        $data = $request->all();
        $input = json_decode($data['data'], true);
        $newDate = $input['expire_hours'];
        $today_date = now()->format("Y-m-d H:i:s");
        $expire_date = now()->modify("+$newDate hours")->format("Y-m-d H:i:s");
        $diff = abs(strtotime($expire_date) - strtotime($today_date));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$new_days = (int)$days;
        unset($data['data']);
        foreach ($input as $key => $value) $data[$key] = $value;

        $response = array();
        $response['code'] = 400;
        
        if ($request->hasFile('image')){
            $validator_data['image'] = 'required|max:50120';
            //|mimes:jpeg,jpg,png,gif,mp4,mpeg-4,mov,wmv,avi,flv,mp3,MOV,HEVC //
        }else{
            $validator_data['content'] = 'nullable';
        }

        

        $validator = Validator::make($data, $validator_data);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
        	
            $story = new Story();
            $story->content = !empty($data['content'])?$data['content']:'';
            $story->user_id = Auth::user()->id;
            $story->link = !empty($data['link'])?$data['link']:'';
            $story->location = !empty($data['location'])?$data['location']:'';
            $days_after_file_delete = $new_days;
            $story->automatically_delete_at = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d h:i:s');

            $file_name = '';

            /*

            if ($request->hasFile('image')) {
                $story->has_story = 1;
                $file = $request->file('image');
                
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
                if ($file->storeAs('/stories/', $file_name)){
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }

            */

             if ($request->hasFile('image')) {
                $story->has_story = 1;
                $file = $request->file('image');
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();

                if ($file->storeAs('/stories/', $file_name)){
                    $destinationPath = public_path('/thumbnail');
                    $img = Image::make($file->path());
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$file_name);
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }

            if ($process){
                if ($story->save()){
                    
                    if ($story->has_story == 1) {

                        $story_image = new StoryImage();
                        $story_image->image_path = $file_name;
                        $story_image->story_id = $story->id;
                        $story_image->user_id = Auth::user()->id;
                        $days_after_file_delete = $new_days;
                        $story_image->automatically_delete_at = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d h:i:s');

                        if ($story_image->save()){
                            $response['code'] = 200;
                        }else{
                            $response['code'] = 400;
                            $response['message'] = "Oops something went wrong!";
                            $story->delete();
                        }
                    }
                    
                    else{
                        $response['code'] = 200;
                    }
                }
            }else{
                $response['code'] = 400;
                $response['message'] = "Oops something went wrong!";
            }

        }

        return Response::json($response);

    }

    public function createQuick(Request $request){
    	
        $data = $request->all();
        $input = json_decode($data['data'], true);
        $newDate = $input['expire_hours'];
        $today_date = now()->format("Y-m-d H:i:s");
        $expire_date = now()->modify("+$newDate hours")->format("Y-m-d H:i:s");
        $diff = abs(strtotime($expire_date) - strtotime($today_date));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$new_days = (int)$days;
        unset($data['data']);
        foreach ($input as $key => $value) $data[$key] = $value;

        $response = array();
        $response['code'] = 400;
        
        if ($request->hasFile('image')){
            $validator_data['image'] = 'required|max:50120';
            //|mimes:jpeg,jpg,png,gif,mp4,mpeg-4,mov,wmv,avi,flv,mp3,MOV,HEVC //
        }else{
            $validator_data['content'] = 'nullable';
        }

        

        $validator = Validator::make($data, $validator_data);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
        	
            $story = new Story();
            $story->content = !empty($data['content'])?$data['content']:'';
            $story->user_id = Auth::user()->id;
            $story->link = !empty($data['link'])?$data['link']:'';
            $story->location = !empty($data['location'])?$data['location']:'';
            $days_after_file_delete = $new_days;
            $story->automatically_delete_at = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d h:i:s');

            $file_name = '';

            if ($request->hasFile('image')) {
                $story->has_story = 1;
                $file = $request->file('image');
                
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
                if ($file->storeAs('/stories/', $file_name)){
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }

            if ($process){
                if ($story->save()){
                    if ($story->has_story == 1) {

                        $story_image = new StoryImage();
                        $story_image->image_path = $file_name;
                        $story_image->story_id = $story->id;
                        $story_image->user_id = Auth::user()->id;
                        $days_after_file_delete = $new_days;
                        $story_image->automatically_delete_at = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d h:i:s');

                        if ($story_image->save()){
                            $response['code'] = 200;
                        }else{
                            $response['code'] = 400;
                            $response['message'] = "Oops something went wrong!";
                            $story->delete();
                        }
                    }else{
                        $response['code'] = 200;
                    }
                }
            }else{
                $response['code'] = 400;
                $response['message'] = "Oops something went wrong!";
            }

        }

        return Response::json($response);
        //return redirect()->to("/10secondi/aziende"); 

    }

    public function selectPostType(){
        $user = Auth::user();

        $my_story = DB::table('stories')
            ->where('stories.user_id', $user->id)
            ->where('stories.automatically_delete_at', '>', Carbon::now() )
            ->orderBy('stories.id', 'DESC')
            ->limit(1)
            ->pluck('id')->first();

        //dd($my_story);
            
        return view('new.new_select', compact('user', 'my_story'));
    }

    public function newQuickPost(Request $request){
        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();    

        return view('new.new_quickpost', compact('user', 'user_list_chats', 'story'));
    }

    public function newPostPhoto(Request $request){
        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();    

        return view('new.new_photo', compact('user', 'user_list_chats', 'story'));
    }

    public function newPostIframe(Request $request){
        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();    

        return view('new.new_iframe', compact('user', 'user_list_chats', 'story'));
    }

     public function newPostInstagram(Request $request){
        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();    

        return view('new.new_instagram', compact('user', 'user_list_chats', 'story'));
    }

    public function newPostTikTok(Request $request){
        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();    

        return view('new.new_tiktok', compact('user', 'user_list_chats', 'story'));
    }

    public function newPostFacebook(Request $request){
        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();    

        return view('new.new_facebook', compact('user', 'user_list_chats', 'story'));
    }

    public function newCheckIn(Request $request){
        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();    

        return view('new.new_check', compact('user', 'user_list_chats', 'story'));
    }

    public function newStory(Request $request){

        $user = Auth::user();

        $username = $user->username;

        $user_list_chats = $user->messagePeopleList();

        $story = Story::where('stories.user_id', $user->id)
            ->where('has_story', 1)
            ->get();

        $stories = DB::table('stories')
            ->where('stories.user_id', $user->id)
            ->where('stories.automatically_delete_at', '>', Carbon::now() )
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->get('story_images.image_path');

        
        return view('new.new_story', compact('user', 'user_list_chats', 'story', 'stories', 'username'));
    }


    public function single(Request $request){ 
    	if($request->username == 'single'){
    		$user = Auth::user();
    	}else{
	    	$user = User::where('username', $request->username)->first();
	}
	
	if(!$user){
		abort(404);
	}
		
        $username = $user->username;

        $story = Story::all();
        
        $stories = DB::table('stories')
            ->where('stories.user_id', $user->id)
            ->where('stories.automatically_delete_at', '>', Carbon::now() )
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->orderBy('stories.id', 'DESC')
            ->get(['story_images.image_path','stories.id as story_id','story_images.id as image_id']);

        $story_id = DB::table('stories')
            ->where('stories.user_id', $user->id)
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->orderBy('id', 'desc')->take(1)
            ->get('stories.id');
            
	if(!$stories->isEmpty() ){
	     return view('single_story', compact('user', 'stories', 'username', 'story', 'story_id'));
	}else{
	     return redirect()->to("/social/$username"); 
	}
        
    }

    public function tenSeconds(){

        $user = Auth::user();

        /*
        $stories = DB::table('stories')
            ->where('stories.automatically_delete_at', '>', Carbon::now() )
            ->join('users', 'users.id', '=', 'stories.user_id')
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->inRandomOrder()
            ->limit(1)
            ->get();
        */

        $stories = Story::where('stories.automatically_delete_at', '>', Carbon::now() )
            ->join('users', 'users.id', '=', 'stories.user_id')
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->inRandomOrder()
            ->limit(1)
            ->get();


        return view('story_list', compact('user', 'stories'));

    }

    public function tenSecondsSaved(){

        $user = Auth::user();

        $story = Story::all();

        $stories = DB::table('stories')
            ->join('users', 'users.id', '=', 'stories.user_id')
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->join('stories_saved', 'stories_saved.story_id', '=', 'stories.id')
            ->where('stories_saved.save_user_id', $user->id)
            //->orderBy('stories.id', 'DESC')
            ->inRandomOrder()
            ->limit(1) // here is yours limit
            ->get();

        return view('stories_saved_list', compact('user', 'stories', 'story'));

    }



    public function tenSecondsList(){

        $user = Auth::user();

        $story = Story::all();

        $stories = DB::table('stories')
            ->join('users', 'users.id', '=', 'stories.user_id')
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->join('stories_saved', 'stories_saved.story_id', '=', 'stories.id')
            ->where('stories_saved.save_user_id', $user->id)
            ->orderBy('stories.id', 'DESC')
            //->inRandomOrder()
            //->limit(1) // here is yours limit
            ->get();

        return view('stories_list_list', compact('user', 'stories', 'story'));

    }

     public function tenSecondsSingle(Request $request, $id){
	
        $user = Auth::user();

        $username = $user->username;
        $story = Story::find($id);
	
	    if (!$story) return redirect('/10secondi/list');

        $update_all = $story->saves()->where('seen', 0)->update(['seen' => 1]);
        $update_all = DB::table('video_send')
        ->where('story_id', $story->id)
        ->where('azienda_id', $user->id)
        ->where('seen', null)->update(['seen' => 1]);

        return view('ten_seconds_single', compact('user', 'username', 'story'));
        
    }
    
    public function singleStory(Request $request,$story_id,$image_id){
	//$user = User::where('username', $request->username)->first();
        $user = Auth::user();

        $username = $user->username;

	$story = Story::where("id",$story_id)->first();
	if(!$story){
		abort(404);
	}
	$storyImage = $story->images()->where('id',$image_id)->first();
	if(!$storyImage){
		abort(404);
	}
        
        return view('single_story_test', compact('user', 'storyImage', 'username', 'story'));
    }
    
    public function tenSecondsAziende(Request $request){

        $user = Auth::user();
        $category = Categorie::all();
        $distance = $request->distance ? $request->distance : 1000;
        $category_id = $request->category_id ? $request->category_id : 0;
        $aziende = $user->findNearbyCompanies($distance);      

        $sent = $aziende; 

        $my_story = DB::table('stories')
            ->where('stories.user_id', $user->id)
            ->where('stories.automatically_delete_at', '>', Carbon::now() )
            ->orderBy('stories.id', 'DESC')
            ->limit(1)
            ->pluck('id')->first();
        
        //$offer_sent = StorySend::where('story_id', $my_story)->where('azienda_id', $sent_azienda)->first();
        $offer_sent = DB::table('video_send')->where('story_id', $my_story)->where('azienda_id', $sent)->first();
        
        return view('stories_aziende_list', compact('user', 'aziende', 'category', 'my_story', 'offer_sent', 'sent'));

    }

    public function tenSecondsSend(Request $request){

       
        $user = Auth::user();

        $send = new StorySend;
        $send->story_id = $request->story_id;
        $send->influencer_id = $user->id;
        $send->azienda_id = $request->azienda_id;
        $send->save();

        $user_name = $request->azienda_id;

        $name = Dettagli::where('id_utente', $user_name)
            ->join('users', 'users.id', '=', 'campi_aggiuntivi.id_utente')
            ->pluck('username')
            ->first();

        return redirect()->back()->with('success','Inviato a '.$name.'!');
       

    }

    public function new(Request $request){

        $data = $request->all();

        $input = json_decode($data['data'], true);
        unset($data['data']);
        foreach ($input as $key => $value) $data[$key] = $value;

        $response = array();
        $response['code'] = 400;
        
        if ($request->hasFile('image')){
            $validator_data['image'] = 'required|max:50120';
            //|mimes:jpeg,jpg,png,gif,mp4,mpeg-4,mov,wmv,avi,flv,mp3,MOV,HEVC //
        }else{
            $validator_data['content'] = 'nullable';
        }

        $validator = Validator::make($data, $validator_data);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $story = new Story();
            $story->content = !empty($data['content'])?$data['content']:'';
            $story->user_id = Auth::user()->id;
            $story->link = !empty($data['link'])?$data['link']:'';
            $story->location = !empty($data['location'])?$data['location']:'';
            $days_after_file_delete = 1;
            $story->automatically_delete_at = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d');

            $file_name = '';

            if ($request->hasFile('image')) {
                $story->has_story = 1;
                $file = $request->file('image');
                
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
                if ($file->storeAs('/stories/', $file_name)){
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }

            if ($process){
                if ($story->save()){
                    if ($story->has_story == 1) {

                        $story_image = new StoryImage();
                        $story_image->image_path = $file_name;
                        $story_image->story_id = $story->id;
                        $story_image->user_id = Auth::user()->id;
                        $days_after_file_delete = 1;
                        $story_image->automatically_delete_at = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d');

                        if ($story_image->save()){
                            $response['code'] = 200;
                        }else{
                            $response['code'] = 400;
                            $response['message'] = "Oops something went wrong!";
                            $story->delete();
                        }
                    }else{
                        $response['code'] = 200;
                    }
                }
            }else{
                $response['code'] = 400;
                $response['message'] = "Oops something went wrong!";
            }


        }

        return Response::json($response);

    }


    public function saveStory(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $story = Story::find($request->input('id'));

        if ($story){
            $story_save = StorySave::where('story_id', $story->id)->where('save_user_id', $user->id)->get()->first();

            if ($story_save) { // Unsave
                if ($story_save->save_user_id == $user->id) {
                    $deleted = DB::delete('delete from stories_saved where story_id='.$story_save->story_id.' and save_user_id='.$story_save->save_user_id);
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'unsave';
                    }
                }
            }else{
                // save
                $story_save = new storysave();
                $story_save->story_id = $story->id;
                $story_save->save_user_id = $user->id;
                if ($story_save->save()){
                    $response['code'] = 200;
                    $response['type'] = 'save';
                }
            }
        }

        return Response::json($response);
    }



    public function deleteStory(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $story = Story::find($request->input('story_id'));
        $story->delete();

        //return Response::json($response);
        return redirect()->to("/newpost"); 
    }
    
    

}   
