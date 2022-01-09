<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\IPAPI;
use App\Library\sHelper;
use App\Library\PastHelper;
use App\Models\Group;
use App\Models\Hobby;
use App\Models\UserHobbies;
use App\Models\UserFollowing;
use App\Models\Post;
use App\Models\Story;
use App\Models\PostTag;
use App\Models\App\Campagna;
use App\Models\Auth\User;
use DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SocialFeedController extends Controller
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
    public function index(Request $request)
    {
        
        $user = Auth::user();
        $user_list = $user->messagePeopleList();
        $user_list = [];

        $wall = [
            'new_post_group_id' => 0
        ];

        $list = $user->following()->where('allow', 1)->with('following')->inRandomOrder()->get();

        /*
        $my_story = Story::where('stories.user_id', $user->id)
            ->where('stories.automatically_delete_at', '>', Carbon::now() )
            ->join('users', 'users.id', '=', 'stories.user_id')
            ->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->orderBy('stories.id', 'DESC')
            ->limit(1)
            ->get();
        */
        $my_story = DB::table('stories')
            ->where('stories.user_id', $user->id)
            ->where('stories.automatically_delete_at', '>', Carbon::now() )
            //->join('users', 'users.id', '=', 'stories.user_id')
            //->join('story_images', 'story_images.story_id', '=', 'stories.id')
            ->orderBy('stories.id', 'DESC')
            ->limit(1)
            ->pluck('id')->first();

        return view('feed', compact('user', 'wall', 'user_list', 'list', 'my_story'));

    }


    public function search(Request $request){

        $s = $request->input('s');
        //if (empty($s)) return redirect('/');

        $user = Auth::user();

        $posts = Post::where('posts.private', 0)
        ->leftJoin('post_hashtags', 'post_hashtags.post_id', '=', 'posts.id')
        ->leftJoin('users', 'users.id', '=', 'posts.user_id')
        ->leftJoin('post_images', 'post_images.id', '=', 'posts.id')
          //->where('post_images.private_photo', '!=', 1)
        
        
            ->where(function($query) use ($user) {

                $query->where('users.private', 0)->orWhere(function($query) use ($user){
                    $query->whereExists(function ($query) use($user){
                        $query->select(DB::raw(1))
                            ->from('user_following')
                            ->whereRaw('user_following.following_user_id = users.id and user_following.follower_user_id = '.$user->id);
                    });
                })->orWhere(function($query) use ($user){
                    $query->where('users.private', 1)->where('users.id', $user->id);
                });

            })
            ->where('post_hashtags.hashtag_id', 'like', '%'.$s.'%')
            ->orWhere('posts.content', 'like', '%'.$s.'%')
            ->groupBy('posts.id')
            ->select('posts.*')
            ->inRandomOrder()
            ->get();

        $comment_count = 10;

        $users = User::where('users.active', 1)
            
            ->join('campi_aggiuntivi', 'campi_aggiuntivi.id_utente', '=', 'users.id')
            ->where('first_name', 'like', '%'.$s.'%')
            ->orWhere('last_name', 'like', '%'.$s.'%')
            ->orWhereRaw("concat(first_name, ' ', last_name) like '%$s%' ")
             //->orWhere('first_name, last_name', 'like', '%'.$s.'%')
            ->orWhere('username', 'like', '%'.$s.'%')
           
            ->orWhere('bio', 'like', '%'.$s.'%')
            ->orWhere('profession', 'like', '%'.$s.'%')
            ->orWhere('campi_aggiuntivi.azienda_nome', 'like', '%'.$s.'%')
            ->inRandomOrder()->get();

        $modal_list = User::select('users.*')->where('users.active', 1)->orderBy('id', 'DESC');

        $campagne = Campagna::join('categorie_campagne', 'categorie_campagne.campagna_id', '=', 'campagne.id')
            ->join('categorie', 'categorie.id', '=', 'categorie_campagne.categorie_id')
            ->join('comuni_campagne', 'comuni_campagne.campagna_id', '=', 'campagne.id')
            ->join('comuni', 'comuni.id', '=', 'comuni_campagne.comuni_id')
            ->join('campi_aggiuntivi', 'campi_aggiuntivi.id_utente', '=', 'campagne.user_id')
            ->join('users', 'users.id', '=', 'campagne.user_id')
            ->where('campagne.titolo', 'like', '%'.$s.'%')
            ->orWhere('campagne.descrizione', 'like', '%'.$s.'%')
            ->orWhere('categorie.nome', 'like', '%'.$s.'%')
            ->orWhere('comuni.nome', 'like', '%'.$s.'%')
            ->orWhereRaw('campi_aggiuntivi.azienda_nome', 'like', '%'.$s.'%')
            ->orWhere('users.username', 'like', '%'.$s.'%')
            ->groupBy('campagne.id')->select('campagne.*')->orderBy('campagne.id', 'DESC')->get();

        $groups_search = Group::join('hobbies', 'hobbies.id', '=', 'groups.hobby_id')
            ->where('category', 'like', '%'.$s.'%')
            ->orWhere('name', 'like', '%'.$s.'%')
            ->select('groups.*')
            ->orderBy('name', 'ASC')
            ->get();

        $hashtags = PostTag::where('tag_id', '!=', ' ')
        ->limit(5)
        ->inRandomOrder()
        ->get();
        
        return view('search', compact('users', 'posts', 'user', 'campagne', 'groups_search', 'comment_count', 'modal_list' ,'hashtags', 's'));

    }

    public function searchUsers(Request $request){

        $s = $request->input('s');
        if (empty($s)) return redirect('/');

        $user = Auth::user();

        $users = User::where('first_name', 'like', '%'.$s.'%')->orWhere('last_name', 'like', '%'.$s.'%')->orWhere('username', 'like', '%'.$s.'%')->orderBy('first_name', 'ASC')->get();
        
        return view('search.users', compact('users', 'user'));

    }


    public function searchHashtags(Request $request){

        $s = $request->input('s');

        $user = Auth::user();

        $posts = Post::where('posts.private', 0)
        ->leftJoin('post_hashtags', 'post_hashtags.post_id', '=', 'posts.id')
        ->leftJoin('users', 'users.id', '=', 'posts.user_id')
        
        
            ->where(function($query) use ($user) {

                $query->where('users.private', 0)->orWhere(function($query) use ($user){
                    $query->whereExists(function ($query) use($user){
                        $query->select(DB::raw(1))
                            ->from('user_following')
                            ->whereRaw('user_following.following_user_id = users.id and user_following.follower_user_id = '.$user->id);
                    });
                })->orWhere(function($query) use ($user){
                    $query->where('users.private', 1)->where('users.id', $user->id);
                });

            })
            ->where('post_hashtags.hashtag_id', 'like', '%'.$s.'%')
            ->orWhere('posts.content', 'like', '%'.$s.'%')
            ->groupBy('posts.id')
            ->select('posts.*')
            ->inRandomOrder()
            ->get();
        
        

        $comment_count = 10;

        
        return view('search.hashtags', compact('posts', 'user', 'comment_count', 's'));

    }

    public function searchPhotos(Request $request){

        $s = $request->input('s');
        if (empty($s)) return redirect('/');

        $user = Auth::user();

        $posts = Post::leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->where(function($query) use ($user) {

                $query->where('users.private', 0)->orWhere(function($query) use ($user){
                    $query->whereExists(function ($query) use($user){
                        $query->select(DB::raw(1))
                            ->from('user_following')
                            ->whereRaw('user_following.following_user_id = users.id and user_following.follower_user_id = '.$user->id);
                    });
                })->orWhere(function($query) use ($user){
                    $query->where('users.private', 1)->where('users.id', $user->id);
                });

            })->where('posts.content', 'like', '%'.$s.'%')->where('posts.group_id', 0)
            //->groupBy('posts.id')->select('posts.*')->orderBy('posts.id', 'DESC')->get();
            ->groupBy('posts.id')->select('posts.*')->inRandomOrder()->get();

        $comment_count = 10;

        $users = User::where('first_name', 'like', '%'.$s.'%')->orWhere('last_name', 'like', '%'.$s.'%')->orWhere('username', 'like', '%'.$s.'%')->orderBy('first_name', 'ASC')->get();

        
        
        return view('search.images', compact('users', 'posts', 'user', 'comment_count'));

    }

    public function searchGroups(Request $request){

        $s = $request->input('s');
        if (empty($s)) return redirect('/');

        $user = Auth::user();

         $groups_search = Group::join('hobbies', 'hobbies.id', '=', 'groups.hobby_id')
            ->where('category', 'like', '%'.$s.'%')
            ->orWhere('name', 'like', '%'.$s.'%')
            ->select('groups.*')
            ->orderBy('name', 'ASC')
            ->get();
        
        return view('search.groups', compact('users', 'user', 'group_search'));

    }


    public function searchCampagne(Request $request){

        $s = $request->input('s');
        if (empty($s)) return redirect('/');

        $user = Auth::user();

        $campagne = Campagna::join('categorie_campagne', 'categorie_campagne.campagna_id', '=', 'campagne.id')
            ->join('categorie', 'categorie.id', '=', 'categorie_campagne.categorie_id')
            ->join('comuni_campagne', 'comuni_campagne.campagna_id', '=', 'campagne.id')
            ->join('comuni', 'comuni.id', '=', 'comuni_campagne.comuni_id')
            ->join('campi_aggiuntivi', 'campi_aggiuntivi.id_utente', '=', 'campagne.user_id')
            ->join('users', 'users.id', '=', 'campagne.user_id')
            ->where('campagne.titolo', 'like', '%'.$s.'%')
            ->orWhere('campagne.descrizione', 'like', '%'.$s.'%')
            ->orWhere('categorie.nome', 'like', '%'.$s.'%')
            ->orWhere('comuni.nome', 'like', '%'.$s.'%')
            ->orWhereRaw('campi_aggiuntivi.azienda_nome', 'like', '%'.$s.'%')
            ->orWhere('users.username', 'like', '%'.$s.'%')
            ->groupBy('campagne.id')->select('campagne.*')->orderBy('campagne.id', 'DESC')->get();
        
         $users = User::where('first_name', 'like', '%'.$s.'%')->orWhere('last_name', 'like', '%'.$s.'%')->orWhere('username', 'like', '%'.$s.'%')->orderBy('first_name', 'ASC')->get();


        return view('search.campagne', compact('user', 'campagne', 'users'));

    }

    public function avatarNotifications(){

        $user->Auth::user();

        $unseen = DB::table('user_direct_messages')
            ->where('receiver_user_id', $user->id)
            ->where('seen', 0)
            ->get();

        return view('avatar', compact('user', 'unseen'));

    }


}
