<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\App\Campagna;
use App\Models\App\Categorie;
use App\Models\CampagnaLocation;
use Illuminate\Support\Facades\Config;

class NearbyController extends Controller
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

        $campagna = Campagna::all();
       
        $category = Categorie::all();
        $distance = $request->distance ? $request->distance : 10;
        
        $nearby = $user->findNearby($distance);
        $nearbyCompaign = $user->findNearbyCompaign($distance,0);

        return view('nearby.index', compact('user', 'nearby', 'nearbyCompaign', 'category'));
    }
    
    public function nearByData(Request $request)
    {
        $user = Auth::user();
        $campagna = Campagna::all();
        $category = Categorie::all();
        $distance = $request->distance ? $request->distance : 50;
        $category_id = $request->category_id ? $request->category_id : 0;
        $nearby = $user->findNearby($distance);
        $nearbyCompaign = $user->findNearbyCompaign($distance, $category_id);
        
        return view('nearby.nearbydata', compact('user', 'nearby', 'nearbyCompaign', 'category'));
    }

    public function postsNearby()
    {
        $user = Auth::user();
        $post = Post::all();

        //$nearby = $user->findNearby();
        $vicino = $post->findPostsCloseby();

        return view('nearby.posts_location', compact('user', 'post', 'vicino'));
    }



    public function testIndex(Request $request)
    {
    
        $user = Auth::user();
        //$campagna = Campagna::where('sponsored', 1)->get();
        $campagna = Campagna::all();
       
        $category = Categorie::all();
        $distance = $request->distance ? $request->distance : 10;
        
        $nearby = $user->findNearby($distance);
        $nearbyCompaign = $user->findNearbyCompaign($distance,0);

        return view('nearby.test-index', compact('user', 'nearby', 'nearbyCompaign', 'category'));
    }
    
    public function testNearByData(Request $request)
    {
        $user = Auth::user();
        //$campagna = Campagna::where('sponsored', 1)->get();
        $campagna = Campagna::all();
        $category = Categorie::all();
        $distance = $request->distance ? $request->distance : 50;
        $category_id = $request->category_id ? $request->category_id : 0;
        $nearby = $user->findNearby($distance);
        $nearbyCompaign = $user->findNearbyCompaign($distance, $category_id);
        
        return view('nearby.test-nearbydata', compact('user', 'nearby', 'nearbyCompaign', 'category'));
    }

}

