<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\sHelper;
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

class AmiciController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function relationsRequest(Request $request){

        $response = array();
        $response['code'] = 400;

        $type = $request->input('type');
        $id = $request->input('id');

        $relation = UserRelationship::find($id);

        if ($relation){

            if ($type == 2){
                if ($relation->delete()){
                    $response['code'] = 200;
                }
            }else{
                $relation->allow = 1;
                if ($relation->save()){
                    $response['code'] = 200;
                }
            }

        }

        return Response::json($response);

    }

    public function delete(Request $request){

        $response = array();
        $response['code'] = 400;

        $id = $request->input('id');
        $type = $request->input('type');

        $relation = UserRelationship::find($id);

        if ($relation){

            if ($relation->delete()){
                $response['code'] = 200;
            }

        }

        return Response::json($response);

    }

    public function pending(Request $request){

        $user = Auth::user();

        $list = $user->relatives()->where('allow', 0)->with('relative')->get();

        return view('relations_pending', compact('user', 'list'));
    }

}