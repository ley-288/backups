<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\UserDirectMessage;
use App\Models\MessageLike;
use App\Models\MessageImage;
use App\Models\Reports\BlockUser;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use View;
use Embera\Embera;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = null)
    {
        $user = Auth::user();

        $user_list = $user->messagePeopleList();

        $show = false;
        if ($id != null){
            $friend = User::find($id);
            if ($friend){
                $message_list = UserDirectMessage::where(function ($q) use($friend, $user){
                $q->where(function ($q) use($friend, $user){
                    $q->where('sender_user_id', $user->id)->where('receiver_user_id', $friend->id)->where('sender_delete', 0);
                })->orWhere(function ($q) use($friend, $user){
                    $q->where('receiver_user_id', $user->id)->where('sender_user_id', $friend->id)->where('receiver_delete', 0);
                });
                
            })->orderBy('id', 'DESC')->limit(50);//dd($message_list);

            $update_all = UserDirectMessage::where('receiver_delete', 0)
                ->where('receiver_user_id', $user->id)->where('sender_user_id', $friend->id)->where('seen', 0)->update(['seen' => 1]);

            $can_send_message = true;
            if ($user->messagePeopleList()->where('follower_user_id', $friend->id)->count() == 0){
                $can_send_message = true;
            }
                $show = true;
            }
        }

        return view('messages.index', compact('user', 'user_list', 'show', 'id', 'friend', 'message_list', 'can_send_message'));
        
    }

    


    public function chat(Request $request){

        $response = array();
        $response['code'] = 400;

        $friend = User::find($request->input('id'));

        $user = Auth::user();

        if ($friend){
            $response['code'] = 200;
            $message_list = UserDirectMessage::where(function ($q) use($friend, $user){
                $q->where(function ($q) use($friend, $user){
                    $q->where('sender_user_id', $user->id)->where('receiver_user_id', $friend->id)->where('sender_delete', 0);
                })->orWhere(function ($q) use($friend, $user){
                    $q->where('receiver_user_id', $user->id)->where('sender_user_id', $friend->id)->where('receiver_delete', 0);
                });
            })->orderBy('id', 'DESC')->limit(50);

            $update_all = UserDirectMessage::where('receiver_delete', 0)
                ->where('receiver_user_id', $user->id)->where('sender_user_id', $friend->id)->where('seen', 0)->update(['seen' => 1]);

            $they_blocked_me = BlockUser::where('blocked', Auth::user()->id)->where('blocker', $friend->id)->first();

            $can_send_message = true;
            if ($user->messagePeopleList()->where('follower_user_id', $friend->id)->count() == 0){
                $can_send_message = true;
            }

            $html = View::make('messages.widgets.chat', compact('user', 'friend', 'message_list', 'can_send_message', 'they_blocked_me'));
            $response['html'] = $html->render();
        }

        return Response::json($response);
    }



    public function peopleList(Request $request){

        $response = array();
        $response['code'] = 200;

        $user = Auth::user();

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


        $html = View::make('messages.widgets.people_list', compact('user', 'active_user_id', 'user_list'));
        $response['html'] = $html->render();

        return Response::json($response);

    }

    public function openMessagesList(Request $request, $id = null){

        $response = array();
        $response['code'] = 200;

        $user = Auth::user();

        $user_list_chats = $user->messagePeopleList();

        $show = false;
        if ($id != null){
            $friend = User::find($id);
            if ($friend){
                $show = true;
            }
        }

        $user_list = [];

        $message_list = DB::select( DB::raw("select * from (select * from `user_direct_messages` where `receiver_user_id` = '".$user->id."' and `receiver_delete` = '0' order by `id` desc limit 200000) as group_table group by sender_user_id order by id desc") );

        $new_list = [];
        foreach(array_reverse($message_list) as $list){
            $msg = new UserDirectMessage();
            $msg->dataImport($list);
            $new_list[] = $msg;
        }

        foreach (array_reverse($new_list) as $message){
            $user_list[$message->sender_user_id] = [
                'new' => ($message->seen == 0)?true:false,
                'message' => $message,
                'user' => $message->sender
            ];
        }

        return view('messages.widgets.open_messages_list', compact('user', 'user_list', 'user_list_chats', 'show', 'id'));

    }

    public function notifications(Request $request){
        $response = array();
        $response['code'] = 200;

        $user = Auth::user();

        $user_list = [];

        $message_list = DB::select( DB::raw("select * from (select * from `user_direct_messages` where `receiver_user_id` = '".$user->id."' and `receiver_delete` = '0'  and `seen` = '0' order by `id` desc limit 200000) as group_table group by sender_user_id order by id desc") );

        $new_list = [];
        foreach(array_reverse($message_list) as $list){
            $msg = new UserDirectMessage();
            $msg->dataImport($list);
            $new_list[] = $msg;
        }

        foreach (array_reverse($new_list) as $message){
            $user_list[$message->sender_user_id] = [
                'new' => ($message->seen == 0)?true:false,
                'message' => $message,
                'user' => $message->sender
            ];
        }

        $html = View::make('messages.widgets.notifications', compact('user', 'user_list'));
        $response['html'] = $html->render();

        return Response::json($response);
    }

    public function deleteChat(Request $request){
        $response = array();
        $response['code'] = 400;

        $friend = User::find($request->input('id'));

        $user = Auth::user();



        if ($friend){
            $response['code'] = 200;

            $update_all = UserDirectMessage::where('receiver_delete', 0)
                ->where('receiver_user_id', $user->id)->where('sender_user_id', $friend->id)->update(['receiver_delete' => 1]);
            $update_all = UserDirectMessage::where('sender_delete', 0)
                ->where('sender_user_id', $user->id)->where('receiver_user_id', $friend->id)->update(['sender_delete' => 1]);

        }

        return Response::json($response);
    }


    public function deleteMessage(Request $request){

        $response = array();
        $response['code'] = 400;

        $message = UserDirectMessage::find($request->input('id'));

        $user = Auth::user();

        if ($message){
            $response['code'] = 200;

            if ($message->sender_user_id == $user->id){
                $message->sender_delete = 1;
            }else{
                $message->receiver_delete = 1;
            }

            if ($message->save()){
                $response['code'] = 200;
            }

        }

        return Response::json($response);
    }


    public function newMessages(Request $request){

        $response = array();
        $response['code'] = 400;

        $friend = User::find($request->input('id'));

        $user = Auth::user();

        if ($friend){
            $response['code'] = 200;

            $message_list = UserDirectMessage::where('receiver_delete', 0)
                ->where('receiver_user_id', $user->id)->where('sender_user_id', $friend->id)->where('seen', '0')->orderBy('id', 'DESC')->limit(20);

            if ($message_list->count() > 0) {

                $response['find'] = 1;
                $html = View::make('messages.widgets.new_messages', compact('user', 'friend', 'message_list'));
                $response['html'] = $html->render();

                $update_all = UserDirectMessage::where('receiver_delete', 0)
                    ->where('receiver_user_id', $user->id)->where('sender_user_id', $friend->id)->where('seen', 0)->update(['seen' => 1]);
            }else{
                $response['find'] = 0;
            }
        }

        return Response::json($response);
    }

    public function send(Request $request){
	
        $response = array();
        $response['code'] = 400;

        $friend = User::find($request->input('id'));//dd($friend);

        $user = Auth::user();

        if ($friend){
            $message = new UserDirectMessage();
            $message->sender_user_id = $user->id;
            $message->receiver_user_id = $friend->id;
            $message->message = $request->input('message') != null ? $request->input('message') : " ";

            $file_name = '';

            if ($request->hasFile('image')) {
                $message->has_image = 1;
                $file = $request->file('image');//dd($file);

                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
                if ($file->storeAs('/messages/', $file_name)) {
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }

            if ($process){
                if ($message->save()) {
                    if ($message->has_image == 1) {
                        $message_image = new MessageImage();
                        $message_image->image_path = $file_name;
                        $message_image->message_id = $message->id;
                        $message_image->user_id = $user->id;
                        if ($message_image->save()){
                            $response['code'] = 200;
                        }else{
                            $response['code'] = 400;
                            $response['message'] = "Something went wrong!";
                            $message->delete();
                        }
                    }else{
                        $response['code'] = 200;
                    }
                }
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }

            if ($message->save()){
                $response['code'] = 200;
                $html = View::make('messages.widgets.single_message', compact('user', 'message'));
                $response['html'] = $html->render();
                $response['message_id'] = $message->id;
            }
        }

        return Response::json($response);
    }

    public function like(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $message = UserDirectMessage::find($request->input('id'));

        if ($message){
            $message_like = MessageLike::where('message_id', $message->id)->where('like_user_id', $user->id)->get()->first();

            if ($message_like) { // UnLike
                if ($message_like->like_user_id == $user->id) {
                    $deleted = DB::delete('delete from message_likes where message_id='.$message_like->message_id.' and like_user_id='.$message_like->like_user_id);
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'unlike';
                    }
                }
            }else{
                // Like
                $message_like = new MessageLike();
                $message_like->message_id = $message->id;
                $message_like->like_user_id = $user->id;
                if ($message_like->save()){
                    $response['code'] = 200;
                    $response['type'] = 'like';
                }
            }
            if ($response['code'] == 200){
                $response['like_count'] = $message->getLikeCount();
            }
        }

        return Response::json($response);
    }

    public function likes(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $message = UserDirectMessage::find($request->input('id'));

        if ($message){
            $response['code'] = 200;
            $html = View::make('widgets.post_detail.messages', compact('message'));
            $response['likes'] = $html->render();
        }

        return Response::json($response);
    }

    public function fetch(Request $request){
        
    }

    public function hideMessages(Request $request){

        $user = Auth::user();
        $reciever = $request->reciever_id;

        $messages = UserDirectMessage::where('reciever_user_id', $user->id)->where('reciever_user_id', $reciever)->find();
        $messages->seen = 1;
        $messages->hidden = 1;
        $messages->update();
        
    }

}
