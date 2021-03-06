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
use App\Models\UserHobby;
use App\Models\UserLocation;
use App\Models\UserRelationship;
use App\Models\UserFollowing;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;

class AziendaProfileController extends Controller
{
    private $user;
    private $my_profile = false;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function secure($b_username, $is_owner = false){
        $user = User::where('b_username', $b_username)->first();

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

    public function index($b_username){

        //if (!$this->secure($username)) return redirect('/404');

        $user = Auth::user();

        $post = Post::all();

        $my_profile = $this->my_profile;

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
        
          return view('profile.b_index', compact('user', 'post', 'my_profile', 'wall', 'can_see', 'hobbies', 'relationship', 'relationship2', 'user_prof', 'groups_prof','user_list_prof', 'hobbies_prof'));
    }


    public function following(Request $request, $b_username){

        if (!$this->secure($b_username)) return redirect('/404');

        $user = $this->user;

        $list = $user->following()->where('allow', 1)->with('following')->orderBy('id', 'DESC')->get();

        $my_profile = $this->my_profile;

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());

        return view('profile.following', compact('user', 'list', 'my_profile', 'can_see'));
    }
    



    public function followers(Request $request, $b_username){

        if (!$this->secure($b_username)) return redirect('/404');

        $user = $this->user;

        $list = $user->follower()->where('allow', 1)->with('follower')->orderBy('id', 'DESC')->get();

        $my_profile = $this->my_profile;

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());

        $update_all = DB::table('user_following')
                ->where([['seen', 0],['following_user_id','=', $user->id]])
                ->update(['seen' => 1]);                     

        return view('profile.followers', compact('user', 'list', 'my_profile', 'can_see' ));
    }
    

    public function amici(Request $request, $b_username){

        if (!$this->secure($b_username)) return redirect('/404');

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
        $spidergain_group_post->save();

        $spidergain_group_post_has_image = new PostImage;
        $spidergain_group_post_has_image->post_id =  $spidergain_group_post->id;
        $spidergain_group_post_has_image->image_path = '34ae64136d5300eaa92163a054cc4ca8.png';
        $spidergain_group_post_has_image->save(); 
        
        return redirect('/groups'); 
       
    }
   

    public function saveInformation(Request $request, $b_username){
        $response = array();
        $response['code'] = 400;
        if (!$this->secure($b_username, true)) return Response::json($response);

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

    public function saveHobbies(Request $request, $b_username){

        if (!$this->secure($b_username)) return redirect('/404');

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

    public function deleteHobby(Request $request, $b_username){
        
        
        $group = $request->input('group_id_list');

        if ($group->delete()) {

            $request->session()->flash('alert-success', 'Group deleted');

        }else{
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }
        return Redirect::back()->withErrors(['Spider rimosso dal gruppo', 'The Message']);
        

    }



    public function saveUserToGroup(Request $request, $b_username){

        if (!$this->secure($b_username)) return redirect('/404');

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

    public function saveRelationship(Request $request, $b_username){

        if (!$this->secure($b_username)) return redirect('/404');

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

        return redirect('/social/'.Auth::user()->b_username);

    }

    public function uploadProfilePhoto(Request $request, $b_username){

        $response = array();
        $response['code'] = 400;
        if (!$this->secure($b_username, true)) return Response::json($response);

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

    public function uploadCover(Request $request, $b_username){

        $response = array();
        $response['code'] = 400;
        if (!$this->secure($b_username, true)) return Response::json($response);

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
            if ($file->storeAs('/storage/covers/', $file_name)){
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
}
