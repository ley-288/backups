<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\sHelper;
use App\Library\PastHelper;
use App\Models\Auth\User;
use App\Models\UserFollowing;
use App\Models\UserRelationship;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;
use View;


class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

      
    public function follow(Request $request){

        $response = array();
        $response['code'] = 400;

        $following_user_id = $request->input('following');
        $follower_user_id = $request->input('follower');
        $element = $request->input('element');
        $size = $request->input('size');

        $following = User::find($following_user_id);
        $follower = User::find($follower_user_id);


        if ($following && $follower && ($following_user_id == Auth::id() || $follower_user_id == Auth::id())){

            $relation = UserFollowing::where('following_user_id', $following_user_id)->where('follower_user_id', $follower_user_id)->get()->first();
            $reverseRelation = UserFollowing::where('following_user_id', $follower_user_id)->where('follower_user_id', $following_user_id)->first();
            $spidergia = UserRelationship::where('related_user_id', $following_user_id)->where('main_user_id', $follower_user_id)->first();
            $reverseSpidergia = UserRelationship::where('related_user_id', $follower_user_id)->where('main_user_id', $following_user_id)->first();
            
            if ($relation){
                if ($relation->delete()){
                    $response['code'] = 200;
                    if ($following->isPrivate()) {
                        $response['refresh'] = 1;
                    }
                    UserRelationship::where('main_user_id', $follower_user_id)->where('related_user_id', $following_user_id)->delete();
                    UserRelationship::where('main_user_id', $following_user_id)->where('related_user_id', $follower_user_id)->delete();
                }
            }else{
                $relation = new UserFollowing();
                $relation->following_user_id = $following_user_id;
                $relation->follower_user_id = $follower_user_id;
                
                if ($following->isPrivate()){
                    $relation->allow = 0;
                }else{
                    $relation->allow = 1;
                }
                if ($relation->save()){
                    $response['code'] = 200;
                    $response['refresh'] = 0;

                    if ($follower->hasRole('influencer') && $following->hasRole('influencer')) {

                    if ($relation && $reverseRelation && ! $spidergia && ! $reverseSpidergia){

                        $relationz = new UserRelationship();
                        $relationz->main_user_id = $follower_user_id;
                        $relationz->relation_type = 1;
                        $relationz->related_user_id = $following_user_id;
                        $relationz->allow = 1;
                        $relationz->save();

                        $relationx = new UserRelationship();
                        $relationx->main_user_id = $following_user_id;
                        $relationx->relation_type = 1;
                        $relationx->related_user_id = $follower_user_id;
                        $relationx->allow = 1;
                        $relationx->save();

                    }

                    } 
                     
                    if ($follower->hasRole('brand') && $following->hasRole('brand')) {

                    if ($relation && $reverseRelation && ! $spidergia && ! $reverseSpidergia){

                        $relationy = new UserRelationship();
                        $relationy->main_user_id = $follower_user_id;
                        $relationy->relation_type = 2;
                        $relationy->related_user_id = $following_user_id;
                        $relationy->allow = 1;
                        $relationy->save();

                        $relationw = new UserRelationship();
                        $relationw->main_user_id = $following_user_id;
                        $relationw->relation_type = 2;
                        $relationw->related_user_id = $follower_user_id;
                        $relationw->allow = 1;
                        $relationw->save();

                    }
                    
                    }              
                }
            }

            if ($response['code'] == 200){
                $response['button'] = sHelper::followButton($following_user_id, $follower_user_id, $element, $size);
            }
        }

        return Response::json($response);

    }

    public function followerRequest(Request $request){

        $response = array();
        $response['code'] = 400;

        $type = $request->input('type');
        $id = $request->input('id');

        $following = UserFollowing::find($id);

        if ($following){

            if ($following->following_user_id = Auth::id()){

                if ($type == 2){
                    if ($following->delete()){
                        $response['code'] = 200;
                    }
                }else{
                    $following->allow = 1;
                    if ($following->save()){
                        $response['code'] = 200;
                    }
                }

            }

        }

        return Response::json($response);

    }

    public function followDenied(Request $request){

        $response = array();
        $response['code'] = 400;

        $me = $request->input('me');
        $follower = $request->input('follower');

        $relation = UserFollowing::where('following_user_id', $me)->where('follower_user_id', $follower)->get()->first();

        if ($relation){


            if ($relation->delete()){
                $response['code'] = 200;
            }

        }

        return Response::json($response);

    }

    public function pending(Request $request){


        $user = Auth::user();

        $list = $user->follower()->where('allow', 0)->with('follower')->get();


        return view('followers_pending', compact('user', 'list'));
    }

}