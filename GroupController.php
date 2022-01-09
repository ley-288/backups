<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Library\sHelper;
use App\Models\Group;
use App\Models\Hobby;
use App\Models\UserHobby;
use App\Models\UserDirectMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Response;
use View;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{

    public $group;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function secure($id){
        $group = Group::find($id);

        if ($group){
            $this->group = $group;

            if (!Auth::user()->hasHobby($this->group->hobby_id)) return false;

            return true;
        }
        return false;
    }

    public function index(Request $request)
    {
        $hobbies = Hobby::all();
        $user = Auth::user();
        $user_list = $user->messagePeopleList();
        $group = $this->group;
        $admin = DB::table('hobbies')
            ->where('admin_id', $user->id);

        $groups = Group::join('user_hobbies', 'user_hobbies.hobby_id', '=', 'groups.hobby_id')
            ->where('user_hobbies.user_id', $user->id)->select('groups.*')->orderBy('id', 'DESC');
        
        $update_all = DB::table('user_hobbies')->where('user_id','=', $user->id)
        ->leftJoin('hobbies', 'hobbies.id', '=', 'user_hobbies.hobby_id')
                ->where('hobbies.admin_id', '!=', $user->id)
                ->select('hobbies.*')
                ->update(['seen' => 1]);

        return view('groups.index', compact('user', 'groups', 'group', 'user_list', 'hobbies', 'admin'));

    }

    public function group(Request $request, $id){

        if (!$this->secure($id) && $this->secure($id)) return redirect('/404');

        $user = Auth::user();
        $hobbies = Hobby::all();
        $groups = Group::all();
        $group = $this->group;
        $user_list = $user->messagePeopleList();

        
        $members = Hobby::join('user_hobbies', 'user_hobbies.hobby_id', '=', 'hobbies.id')
            ->join('users', 'user_hobbies.user_id', '=', 'users.id')
            ->where('user_hobbies.hobby_id', '=', $group->hobby_id)
            ->select('users.*')
            ->orderBy('id', 'DESC')->get();


        $wall = [
            'new_post_group_id' => $group->id
        ];
        

        return view('groups.group', compact('user', 'members', 'group', 'groups', 'user_list', 'wall', 'hobbies'));
    }


    public function stats($id){

        if (!$this->secure($id) && $this->secure($id)) return redirect('/404');

        $user = Auth::user();
        $hobbies = Hobby::all();
        $group = $this->group;

        return view('groups.stats', compact('user', 'group', 'hobbies'));
    }

    public function saveUserToGroup(Request $request, $username){

        $response = array();
        $response['code'] = 200;

        if ($this->secure($username)) return redirect('/404');

        $user = Auth::user();
        $hobbies = Hobby::all();
        $groups = Group::all();
        $seen = UserHobby::all();
      

        $member = new UserHobby();
        $person = $request->input('person');
        $group = $request->input('group');

        $member->user_id = $person;
        $member->hobby_id = $group;

        if ($member->save()) {

            $request->session()->flash('alert-success', 'Your friend has been added to the group!');

        }else{
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }

        $active_user_id = $request->input('active_user_id');

        $user_list = [];

        $message_list = DB::select( DB::raw("select * from (select * from `user_direct_messages` where ((`sender_user_id` = '".$user->id."' and `sender_delete` = '0') or (`receiver_user_id` = '".$user->id."' and `receiver_delete` = '0')) order by `id` desc limit 200000) as group_table group by receiver_user_id, receiver_user_id order by id desc") );

        $new_list = [];
        foreach(array_reverse($message_list) as $list){
            $msg = new UserDirectMessage();
            $msg->dataImport($list);
            $new_list[] = $msg;
        }

        foreach (array_reverse($new_list) as $message){
            if ($message->sender_user_id == $user->id){
                if (array_key_exists($message->receiver_user_id, $user_list)) continue;
                $user_list[$message->receiver_user_id] = [
                    'new' => false,
                    'message' => $message,
                    'user' => $message->receiver
                ];
            }else{
                if (array_key_exists($message->sender_user_id, $user_list)) continue;
                $user_list[$message->sender_user_id] = [
                    'new' => ($message->seen == 0)?true:false,
                    'message' => $message,
                    'user' => $message->sender
                ];
            }
        }

        $html = View::make('groups.widgets.people_list', compact('user', 'member', 'hobbies', 'person', 'group', 'groups', 'active_user_id', 'user_list'));
        $response['html'] = $html->render();

        return Redirect::back()->withErrors(['Spider aggiunto al gruppo con successo!', 'The Message']);
    
    }

    public function removeUserFromGroup(Request $request, $username){
        $group = Group::find($request->groupId);

        $member = UserHobby::where('user_id',$request->id)->where('hobby_id',$group->hobby_id);

        if ($member->delete()) {

            $request->session()->flash('alert-success', 'Member Removed from this group!');

        }else{
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }
        return Redirect::back()->withErrors(['Spider rimosso dal gruppo', 'The Message']);
        

    }

    public function peopleList(Request $request){

        $response = array();
        $response['code'] = 200;

        $user = Auth::user();
        $hobbies = Hobby::all();
        $groups = Group::all();

        $group_member = UserHobby::where('user_id',$request->id)->where('hobby_id',$group->hobby_id);

        $active_user_id = $request->input('active_user_id');

        $user_list = [];

        $message_list = DB::select( DB::raw("select * from (select * from `user_direct_messages` where ((`sender_user_id` = '".$user->id."' and `sender_delete` = '0') or (`receiver_user_id` = '".$user->id."' and `receiver_delete` = '0')) order by `id` desc limit 200000) as group_table group by receiver_user_id, receiver_user_id order by id desc") );

        $new_list = [];
        foreach(array_reverse($message_list) as $list){
            $msg = new UserDirectMessage();
            $msg->dataImport($list);
            $new_list[] = $msg;
        }

        foreach (array_reverse($new_list) as $message){
            if ($message->sender_user_id == $user->id){
                if (array_key_exists($message->receiver_user_id, $user_list)) continue;
                $user_list[$message->receiver_user_id] = [
                    'new' => false,
                    'message' => $message,
                    'user' => $message->receiver
                ];
            }else{
                if (array_key_exists($message->sender_user_id, $user_list)) continue;
                $user_list[$message->sender_user_id] = [
                    'new' => ($message->seen == 0)?true:false,
                    'message' => $message,
                    'user' => $message->sender
                ];
            }
        }

        $html = View::make('groups.widgets.people_list', compact('user', 'hobbies', 'groups', 'active_user_id', 'user_list', 'group_member'));
        $response['html'] = $html->render();

        return Response::json($response);

    }

    public function userInformation(){

        $groups = Group::leftJoin('user_hobbies', 'user_hobbies.hobby_id', '=', 'groups.hobby_id')
               ->where('groups->user_id->username', $this->user->username)
               ->get();

    }

    public function deleteGroup(Request $request){

        $response = array();
        $response['code'] = 400;

        $user = Auth::user();
        $group_id = $request->input('group_hobby_id');

        $groups = Group::join('hobbies', 'hobbies.id', '=', 'groups.hobby_id')
            ->where('hobbies.admin_id', $user->id)
            ->delete();

        $group = Hobby::where('id', $group_id)
            ->delete();
        
        return back();

    }

    public function pending(Request $request){

        $user = Auth::user();
        $hobby = $hobby_id;

        $list = $user->relatives()->with('group')->get();

        return view('groups_pending', compact('user', 'list'));
    }

}
