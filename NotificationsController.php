<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\IPAPI;
use App\Library\sHelper;
use App\Models\Group;
use App\Models\Hobby;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostComment;
use App\Models\PostLocation;
use App\Models\App\Campagna;
use App\Models\CampagnaLocation;
use App\Models\App\Categorie;
use App\Models\Auth\User;
use App\Models\City;
use App\Models\Country;
use App\Models\PostLike;
use App\Models\Auth\BaseUser;
use App\Models\UserFollowing;
use App\Models\UserLocation;
use App\Models\UserHobby;
use App\Models\UserRelationship;
use App\Models\Auth\Richiesta;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;


class NotificationsController extends Controller
{

   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function notifications(){

        $user = Auth::user();
        
        return view('notifications.index', compact('user'));
    }


}
