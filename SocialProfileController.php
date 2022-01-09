<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hobby;
use App\Models\App\Categorie;
use App\Models\Group;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Auth\User;
use App\Models\App\Dettagli;
use App\Models\UserHobby;
use App\Models\UserLocation;
use App\Models\UserRelationship;
use App\Models\LinkAccount;
use App\Models\UserFollowing;
use App\Models\Reports\BlockUser;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;
use Image;
use Illuminate\Support\Facades\Storage;

//use Intervention\Image\Facades\Image;
use App\Classes\Slim\Slim;


class SocialProfileController extends Controller
{
    private $user;
    private $my_profile = false;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function secure($username, $is_owner = false){
        $user = User::where('username', $username)->first();

        if ($user){
            $this->user = $user;
            $this->my_profile = (Auth::id() == $this->user->id)?true:false;
            if ($is_owner && !$this->my_profile){
                return false;
            }
            return true;
        }
        return false;
    }

    public function index($username){

        //if (!$this->secure($username)) return redirect('/404');

        if (!$this->secure($username)) return redirect('/feed');

        $user = $this->user;

        $post = Post::all();

        $logged_in = DB::table('audits')->where('user_id', Auth::user()->id)->where('url', '=', 'https://www.spidergain.com/login')->limit('1')->get();

        $my_profile = $this->my_profile;

        $youString = 'youtu';
        
        $photos = Post::where('posts.user_id', $user->id)
            ->where('posts.has_image', 1)
            ->where('posts.spider', 0)
            ->join('post_images', 'post_images.post_id', '=', 'posts.id')
            ->select('post_images.*')->orderBy('id', 'DESC')->get();

        $socials = Post::where('posts.user_id', $user->id)
            ->where('link', 'like', '%' . $youString . '%')
            ->orderBy('id', 'DESC')->get();

        $following = DB::table('user_following')->where('following_user_id', Auth::user()->id)->where('follower_user_id', $user->id)->get();
        $follower = DB::table('user_following')->where('follower_user_id', Auth::user()->id)->where('following_user_id', $user->id)->get();
        

        $wall = [
            'new_post_group_id' => 0
        ];

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());
        
        $hobbies = Hobby::all();
        $relationship = $user->relatives()->with('relative')->where('allow', 1)->get();
        $relationship2 = $user->relatives2()->with('main')->where('allow', 1)->get();

        $i_blocked_them = BlockUser::where('blocker', Auth::user()->id)->where('blocked', $user->id)->first();
        $they_blocked_me = BlockUser::where('blocked', Auth::user()->id)->where('blocker', $user->id)->first();

        $hobbies_prof = Hobby::all();
        $user_prof = Auth::user();
        $user_list_prof = $user->messagePeopleList();

        $groups_prof = Group::join('user_hobbies', 'user_hobbies.hobby_id', '=', 'groups.hobby_id')
            ->where('user_hobbies.user_id', $user->id)->select('groups.*');
        
        return view('profile.view_index', compact('user', 'post', 'logged_in', 'my_profile', 'photos', 'socials', 'following', 'follower', 'wall', 'can_see', 'hobbies', 'relationship', 'relationship2', 'user_prof', 'groups_prof','user_list_prof', 'hobbies_prof', 'i_blocked_them', 'they_blocked_me'));
    }


    public function viewProfile($username){

        //if (!$this->secure($username)) return redirect('/404');
         if (!$this->secure($username)) return redirect('/feed');

        $user = $this->user;

        $post = Post::all();

        $logged_in = DB::table('audits')->where('user_id', Auth::user()->id)->where('url', '=', 'https://www.spidergain.com/login')->limit('1')->get();

        $my_profile = $this->my_profile;

        $youString = 'youtu';
        
        $photos = Post::where('posts.user_id', $user->id)
            ->where('posts.has_image', 1)
            ->where('posts.spider', 0)
            ->join('post_images', 'post_images.post_id', '=', 'posts.id')
            ->select('post_images.*')->orderBy('id', 'DESC')->get();

        $socials = Post::where('posts.user_id', $user->id)
            ->where('link', 'like', '%' . $youString . '%')
            ->orderBy('id', 'DESC')->get();
        


        $following = DB::table('user_following')->where('following_user_id', Auth::user()->id)->where('follower_user_id', $user->id)->get();
        


        $wall = [
            'new_post_group_id' => 0
        ];

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());
        
        $hobbies = Hobby::all();
        $relationship = $user->relatives()->with('relative')->where('allow', 1)->get();
        $relationship2 = $user->relatives2()->with('main')->where('allow', 1)->get();

        $hobbies_prof = Hobby::all();
        $user_prof = Auth::user();
        $user_list_prof = $user->messagePeopleList();

        

        $groups_prof = Group::join('user_hobbies', 'user_hobbies.hobby_id', '=', 'groups.hobby_id')
            ->where('user_hobbies.user_id', $user->id)->select('groups.*');
        
        return view('profile.view_index', compact('user', 'post', 'logged_in', 'my_profile', 'photos', 'socials', 'following', 'wall', 'can_see', 'hobbies', 'relationship', 'relationship2', 'user_prof', 'groups_prof','user_list_prof', 'hobbies_prof'));
    }


    public function following(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $user = $this->user;

        $list = $user->following()->where('allow', 1)->with('following')->orderBy('id', 'DESC')->get();

        $my_profile = $this->my_profile;

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());

        return view('profile.following', compact('user', 'list', 'my_profile', 'can_see'));
    }
    



    public function followers(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $user = $this->user;

        $list = $user->follower()->where('allow', 1)->with('follower')->orderBy('id', 'DESC')->get();

        $my_profile = $this->my_profile;

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());

        $update_all = DB::table('user_following')
                ->where([['seen', 0],['following_user_id','=', $user->id]])
                ->update(['seen' => 1]);                     

        return view('profile.followers', compact('user', 'list', 'my_profile', 'can_see' ));
    }
    

    public function amici(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $user = $this->user;
        
        $list = $user->relatives()->where('allow', 1)->with('relative')->orderBy('id', 'DESC')->get();
        // dd($user->relatives()->get(),$user->id);
        $my_profile = $this->my_profile;

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());

        $update_all = DB::table('user_relationship')
                ->where([['seen', 0],['main_user_id','=', $user->id]])
                ->update(['seen' => 1]); 

        return view('profile.relations', compact('user', 'list', 'my_profile', 'can_see'));
    }


    public function addGroup(Request $request){
        
        $user = Auth::user();
        $categorie = Categorie::all();

        $hobby = new Hobby;
        $hobby->name=$request->name;
        $hobby->category=$request->categorie;
        $hobby->admin_id=$user->id;
        $hobby->admin_username=$user->username;
        $hobby->admin_first_name=$user->first_name;
        $hobby->admin_last_name=$user->last_name;
        $hobby->admin_photo=$user->avatar_location;
        $hobby->admin_verified=$user->verified;
        $hobby->save();

        $group = new Group;
        $group->hobby_id=$hobby->id;
        $group->save();

        $my_hobbies = new UserHobby;
        $my_hobbies->hobby_id=$hobby->id;
        $my_hobbies->user_id=$user->id;
        $my_hobbies->admin_id=$user->id;
        $my_hobbies->save();

        $spidergain_group_post = new Post;
        $spidergain_group_post->user_id = 274;
        $spidergain_group_post->group_id = $group->id;
        $spidergain_group_post->content = 'Benvenuto in Gruppi!';
        $spidergain_group_post->has_image = 1;
        $spidergain_group_post->spider = 1;
        $spidergain_group_post->save();

        $spidergain_group_post_has_image = new PostImage;
        $spidergain_group_post_has_image->post_id =  $spidergain_group_post->id;
        $spidergain_group_post_has_image->image_path = '34ae64136d5300eaa92163a054cc4ca8.png';
        $spidergain_group_post_has_image->save(); 
        
        return redirect('/groups'); 
       
    }
   

    public function saveInformation(Request $request, $username){
        $response = array();
        $response['code'] = 400;
        if (!$this->secure($username, true)) return Response::json($response);

        $data = json_decode($request->input('information'), true);

        $data['map_info'] = json_decode($data['map_info'], true);

        $validator = Validator::make($data, [
            'sex' => 'in:0,1',
            'birthday' => 'date',
            'phone' => 'max:20',
            'bio' => 'max:140',
        ]);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $user = $this->user;
            $user->sex = $data['sex'];
            $user->birthday = $data['birthday'];
            $user->phone = $data['phone'];
            $user->bio = $data['bio'];
            $save = $user->save();
            if ($save){

                $response['code'] = 200;

                if (count($data['map_info']) > 1) {
                    $find_country = Country::where('shortname', $data['map_info']['country']['short_name'])->first();
                    $country_id = 0;
                    if ($find_country) {
                        $country_id = $find_country->id;
                    } else {
                        $country = new Country();
                        $country->name = $data['map_info']['country']['name'];
                        $country->shortname = $data['map_info']['country']['short_name'];
                        if ($country->save()) {
                            $country_id = $country->id;
                        }
                    }

                    $city_id = 0;
                    if ($country_id > 0) {
                        $find_city = City::where('name', $data['map_info']['city']['name'])->where('country_id', $country_id)->first();
                        if ($find_city) {
                            $city_id = $find_city->id;
                        } else {
                            $city = new City();
                            $city->name = $data['map_info']['city']['name'];
                            $city->zip = $data['map_info']['city']['zip'];
                            $city->country_id = $country_id;
                            if ($city->save()) {
                                $city_id = $city->id;
                            }
                        }
                    }

                    if ($country_id > 0 && $city_id > 0) {

                        $find_location = UserLocation::where('user_id', $user->id)->first();

                        if (!$find_location) {

                            $find_location = new UserLocation();
                            $find_location->user_id = $user->id;

                        }

                        $find_location->city_id = $city_id;
                        $find_location->latitud = $data['map_info']['latitude'];
                        $find_location->longitud = $data['map_info']['longitude'];
                        $find_location->address = $data['map_info']['address'];

                        $find_location->save();

                    }
                }
            }
        }

        return Response::json($response);
    }

    public function saveHobbies(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $my_hobbies = Auth::user()->hobbies()->get();

        $list = [];

        foreach((array)$request->input('hobbies') as $i => $id){
            $list[$id] = 1;
        } 
             

        foreach($my_hobbies as $hobby){
            $hobby_id = $hobby->hobby_id;
            if (!array_key_exists($hobby_id, $list)){
                $deleted = DB::delete('delete from user_hobbies where user_id='.Auth::id().' and hobby_id='.$hobby_id);
            }
            unset($list[$hobby_id]);
        }

        foreach($list as $id => $status){
            $hobby = new UserHobby();
            $hobby->user_id = Auth::id();
            $hobby->hobby_id = $id;
            $hobby->save();
        }

        $request->session()->flash('alert-success', 'Your hobbies have been successfully updated!');

        return redirect('/groups');    

    }
    
    public function delete(Request $request){

        $response = array();
        $response['code'] = 400;

        $hobby = Hobby::find($request->input('hobby_group_id'));

        if ($hobby){
            if ($hobby->admin_id == Auth::id()) {
                if ($hobby->delete()) {
                    $response['code'] = 200;
                }
            }
        }

        return Response::json($response);
    }

    public function deleteHobby(Request $request, $username){
        
        
        $group = $request->input('group_id_list');

        if ($group->delete()) {

            $request->session()->flash('alert-success', 'Group deleted');

        }else{
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }
        return Redirect::back()->withErrors(['Spider rimosso dal gruppo', 'The Message']);
        

    }


    public function saveUserToGroup(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $relationship = $request->input('relation');
        $person = $request->input('person');

        $member = new UserHobby();
        $member->user_id = $person;
        $member->hobby_id = $relationship;
        $member->related_user_id = Auth::id();

        if ($member->save()) {

            $request->session()->flash('alert-success', 'Your friend has been added to the group!');

        }else{
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }

        return redirect('/group/{id}');

    }

    public function saveRelationship(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $relationship = $request->input('relation');
        $person = $request->input('person');

        $relation = new UserRelationship();
        $relation->main_user_id = $person;
        $relation->relation_type = $relationship;
        $relation->related_user_id = Auth::id();

        if ($relation->save()) {

            $request->session()->flash('alert-success', 'Your relationship have been successfully requested! He/She needs to accept relationship with you to publish.');

         }else{

            $request->session()->flash('alert-danger', 'Something went wrong!');

        }

        return redirect('/social/'.Auth::user()->username);

    }

    public function uploadProfilePhoto(Request $request, $username){

        $response = array();
        $response['code'] = 400;
        if (!$this->secure($username, true)) return Response::json($response);

        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:5120'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');

            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('/storage/profile_photos/', $file_name)){
                $response['code'] = 200;
                $this->user->profile_path = $file_name;
                $this->user->save();
                $response['image_big'] = $this->user->getPhoto();
                $response['image_thumb'] = $this->user->getPhoto(200, 200);
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);

    }

    public function uploadCover(Request $request, $username){

        $response = array();
        $response['code'] = 400;
        if (!$this->secure($username, true)) return Response::json($response);

        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:5120'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');

            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('/covers/', $file_name)){
                $response['code'] = 200;
                $this->user->cover_path = $file_name;
                $this->user->save();
                $response['image'] = $this->user->getCover();
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);

    }

    public function deleteCover(Request $request){

        $user = Auth::user();
        $user->cover_path = null;
        $user->save();

        return redirect('/social/'.Auth::user()->username);

    }


    public function updateProfileImages(Request $request){	
     	$user = Auth::user();
     	$user->private = $request->profile_type == 1 ? '1' : '0';
        $user->avatar_private = $request->avatar_private == 1 ? '1' : '0';
        $user->address_visible = $request->address_visible == 1 ? '1' : '0';
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
	    $user->bio = $request->profile_bio;
        $user->profession = $request->profession;
        $user->city = $request->city;
	    $user->save();


        
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $file_name = '';
            $file_name = time().'.'.$avatar->getClientOriginalExtension();
            $file = $request->file('avatar');
            $file->storeAs('/avatar/', $file_name);
            $user = Auth::user();
            $user->avatar_location = ('avatar/'.$file_name);
            $user->save();
        }
        

        
        
        
        return redirect('/social/'.Auth::user()->username);
        
    }

    public function updateProfileCover(Request $request){	

     	$user = Auth::user();

        if($request->hasFile('cover'))
        {
            $cover = $request->file('cover');
            $file_name = '';
            $file_name = time().'.'.$cover->getClientOriginalExtension();
            $file = $request->file('cover');
            $file->storeAs('/covers/', $file_name);
            $user = Auth::user();
            $user->cover_path = $file_name;
            $user->save();
        }
        
        return redirect('/social/'.Auth::user()->username);
        
    }


    public function utentedelete() {
        $user = Auth::user();
        $user->active = 0;
        $user->complete = 0;
        $user->confirmed = 0;
        $user->private = 1;
        if ($user->avatar_location != '') {
            Storage::delete($user->avatar_location);
            $user->avatar_location = '';
        }

        $posts = Post::where('user_id', $user->id)->update(['private' => 1]);
         
        $photos = Post::where('posts.user_id', $user->id)
            //->where('posts.has_image', 1)
            //->where('posts.spider', 0)
            ->join('post_images', 'post_images.post_id', '=', 'posts.id')
            ->update(['post_images.private_photo' => 1]);

        UserFollowing::where('following_user_id', $user->id)->delete();
        UserFollowing::where('follower_user_id', $user->id)->delete();
        LinkAccount::where('azienda_id', $user->id)->delete();
        LinkAccount::where('linked_id', $user->id)->delete();

        if ($user->hasRole('brand')) {
            \App\Models\App\Campagna::where('user_id', $user->id)->update(['active' => 0]);
        }

        $user->save();
        DB::table('social_accounts')->where('user_id', $user->id)->delete();
        Auth::logout();
        return \Illuminate\Support\Facades\Redirect::route('frontend.auth.login');
    }


    public function blockUser(Request $request){

        $user = Auth::user();

        $block = new BlockUser();
        $block->blocker = $user->id;
        $block->blocked = $request->blocked_id;
        $block->save();

        $user_name = $request->blocked_id;

        UserFollowing::where('following_user_id', $user->id)->where('follower_user_id', $user_name)->update(['allow' => 0]); 
        //UserFollowing::where('following_user_id', $user_name)->where('follower_user_id', $user->id)->update(['allow' => 0]); 

        $name = Dettagli::where('id_utente', $user_name)
            ->join('users', 'users.id', '=', 'campi_aggiuntivi.id_utente')
            ->pluck('username')
            ->first();

        return redirect()->back()->with('success', $name.' Blocked');

    }

    public function unblockUser(Request $request){

        $user = Auth::user();
        $unblock = $request->blocked_id;
        UserFollowing::where('following_user_id', $user->id)->where('follower_user_id', $unblock)->update(['allow' => 1]); 
        BlockUser::where('blocker', $user->id)->where('blocked', $unblock)->delete();

        return back();

    }

    

}
