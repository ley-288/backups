<?php

namespace App\Http\Controllers\frontend\User;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\App\Categorie;
use App\models\App\Comuni;
use App\Models\App\Dettagli;
use App\Models\App\Influencer;
use App\Models\UserFollowing;
use App\Models\Post;
use App\Models\PostImage;
use App\Http\Requests\Frontend\User\CreateDettagliRequest;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
//use Intervention\Image\Facades\Image;
use Image;
use App\Classes\Slim\Slim;
use Twitter;
use SpiderClient;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;



class ProfiloDettagliController extends Controller {

    public function index() {
        
    }

    public function avatarbrand(Request $request) {
        
        
        if ($request->hasFile('slim_output_0')) {
            $extension = $request->slim_output_0->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_0->storeAs('avatar', $filename);
            $utente = User::where('id', Auth::user()->id)->first();
            if($utente->avatar_location != ''){
                Storage::delete($utente->avatar_location);
            }
            $utente->avatar_location = 'avatar/' . $filename;
            $utente->save();
            $image = Image::make('storage/' . $utente->avatar_location);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'avatar_location' => $utente->avatar_location), 200);
        }

    }


    public function coverbrand(Request $request) {
        

        if ($request->hasFile('slim_output_1')) {
            $extension = $request->slim_output_1->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_1->storeAs('/covers/', $filename);
            $utente = User::where('id', Auth::user()->id)->first();
            if($utente->cover_path != ''){
                Storage::delete($utente->cover_path);
            }
            $utente->cover_path = $filename;
            $utente->save();
            $image = Image::make('storage/covers/' . $utente->cover_path);
            $image->crop(700, 450);
            $image->save();
            return Response::json(array('success' => true, 'cover_path' => $utente->cover_path), 200);
        }

    }



    public function avatarbranddelete(Request $request) {
        $user = Auth::user();
        $utente = User::where('id', Auth::user()->id)->first();
        Storage::delete($utente->avatar_location);
        //wasnt sure about it but seems to work... -> 
        $utente->avatar_location = null;
        $utente->save();
        return Response::json(array('success' => true), 200);
    }

    public function coverbranddelete(Request $request) {
        $user = Auth::user();
        $utente = User::where('id', Auth::user()->id)->first();
        Storage::delete($utente->cover_path);
        $utente->cover_path = '';
        $utente->save();
        return Response::json(array('success' => true), 200);
    }

    public function create(Request $request) {
        
        $dettagli = new Dettagli;
        $user = Auth::user();
        $facebook = DB::table('social_accounts')->where('user_id', $user->id)->where('provider', 'facebook')->get();
        $is_facebook = ($facebook->isEmpty()) ? 0 : 1;
        if ($dettagli::where('id_utente', $user->id)->first()) {
            session()->flash('warning', 'Profilo già creato');
            return redirect(route('frontend.user.dashboard'));
        }
        $nazioni = DB::table('countries')->select('id', 'name')->get();
        $utente = User::where('id', Auth::user()->id);
       
        return view('frontend.user.completa-profilo', compact('nazioni'))->with('is_facebook', $is_facebook)->with('user', $user);

    }

    public function utentedelete() {
        $user = Auth::user();
        $user->active = 0;
        $user->complete = 0;
        if ($user->avatar_location != '') {
            Storage::delete($user->avatar_location);
            $user->avatar_location = '';
        }

        if ($user->hasRole('influencer')) {
            $dettagli = Dettagli::where('id_utente', $user->id)->first();
            DB::table('categorie_utenti')->where('dettagli_id', $dettagli->id)->delete();
            $dettagli->delete();
        }

        if ($user->hasRole('brand')) {
            \App\Models\App\Campagna::where('user_id', $user->id)->update(['active' => 0]);
        }

        $user->save();
        DB::table('social_accounts')->where('user_id', $user->id)->delete();
        Auth::logout();
        return \Illuminate\Support\Facades\Redirect::route('frontend.auth.login');
    }

    public function update(CreateDettagliRequest $request) {

        $dettagli = new Dettagli;
        $dettagli = Dettagli::where('id_utente', Auth::user()->id)->first();       

        if ($request->hasFile('profile_avatar')) {
            $extension = $request->profile_avatar->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->profile_avatar->storeAs('avatar', $filename);
            $utente = User::where('id', Auth::user()->id)->first();
            $utente->avatar_location = 'avatar/' . $filename;
            $utente->save();
        } else {

            if (Auth::user()->avatar_location != '') {
                if ($request->del_image) {
                    $utente = User::where('id', Auth::user()->id)->first();
                    Storage::delete($utente->avatar_location);
                    $utente->avatar_location = '';
                    $utente->save();
                }
            }
        }
        $user = Auth::user();
        $utente = $user;
        $utente->username = $request->username;
        $utente->private = $request->private;
        $utente->birthday = $request->birthday;
        $utente->company = $request->company;
        $utente->save();
        
        $utente = User::where('id', Auth::user()->id);
        $dati = $request->all();
        $dettagli->update($dati);

        $dettagli->comuni()->sync($request->comuni);
        session()->flash('flash_success', __('applicazione.profilo_aggiornato'));
        return redirect()->back();
        
        
    }

    public function store(CreateDettagliRequest $request) {

        $user = Auth::user();
        $dettagli = new Dettagli;
        
        
        $utente = User::where('id', Auth::user()->id)->first();
        if ($dettagli::where('id_utente', $user->id)->first()) {
            session()->flash('warning', 'Profilo già creato');
            return redirect(route('frontend.user.dashboard'));
        }
        if ($request->hasFile('profile_avatar')) {
            $extension = $request->profile_avatar->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->profile_avatar->storeAs('avatar', $filename);
            $utente->avatar_location = 'avatar/' . $filename;
            $utente->save();
        } else {
            //$utente->avatar_location = 'null';

            $utente->avatar_location = null;
            $utente->save();
        }
        $request->request->add(['id_utente' => $user->id]);
        $dati = $request->all();
        $dettagli = Dettagli::create($dati);
        $dettagli->comuni()->attach($request->comuni);
        
        $utente->complete = 1;

        $utente->username = $request->username;
        $utente->private = $request->private;
        $utente->birthday = $request->birthday;
        $utente->company = $request->company;

        $spidergain_profile_post = new Post;
        $spidergain_profile_post->user_id = $user->id;
        $spidergain_profile_post->group_id = 0;
        $spidergain_profile_post->content = 'Inizia a condividere i post o foto nella tua bacheca!';
        $spidergain_profile_post->has_image = 0;
        $spidergain_profile_post->spider = 1;
        $spidergain_profile_post->quickpost = 1;
        $spidergain_profile_post->save();

        $spidergain_profile_post = new Post;
        $spidergain_profile_post->user_id = $user->id;
        $spidergain_profile_post->group_id = 0;
        $spidergain_profile_post->content = 'Benvenuto '.$user->first_name.'!';
        $spidergain_profile_post->has_image = 1;
        $spidergain_profile_post->spider = 1;
        $spidergain_profile_post->save();

        $spidergain_group_post_has_image = new PostImage;
        $spidergain_group_post_has_image->post_id =  $spidergain_profile_post->id;
        $spidergain_group_post_has_image->image_path = '34ae64136d5300eaa92163a054cc4d9.png';
        $spidergain_group_post_has_image->save(); 

        $spidergain_follow = new UserFollowing;
        $spidergain_follow->following_user_id = 274;
        $spidergain_follow->follower_user_id = $user->id;
        $spidergain_follow->allow = 1;
        $spidergain_follow->seen = 1;
        $spidergain_follow->save();

        
        $utente->save();
        return redirect('/profilo/categoria')->with('flash_success', __('applicazione.profilo_completo'));   
        //return redirect(route('frontend.user.dashboard', ['res' => 'ok']))->with('flash_success', __('applicazione.profilo_completo'));
    }

    public function edit(Request $request) {

        $user = Auth::user();
        $dettagli = new Dettagli;
        $facebook = DB::table('social_accounts')->where('user_id', $user->id)->where('provider', 'facebook')->get();
        $is_facebook = ($facebook->isEmpty()) ? 0 : 1;
        $dettagli = Dettagli::where('id_utente', Auth::user()->id)->with('comuni')->first();
        $nazioni = DB::table('countries')->select('id', 'name')->get(); 

        $nazioni = DB::table('countries')->select('id', 'name')->get(); 
       
        return view('frontend.user.completa-profilo', compact('nazioni'))->with('dettagli', $dettagli)->with('is_facebook', $is_facebook)->with('user', $user);
    
    }

    public function ruolo() {
        $user = Auth::user();

        if ($user->hasAnyRole('influencer', 'brand')) {
            return redirect()->route('frontend.user.dashboard');
        }

        return view('frontend.user.completa-ruolo');
    }

    public function ruolo_crea(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
                    'register_as' => 'required|in:brand,influencer'
        ]);

        if ($validator->fails()) {
            session()->flash('flash_danger', __('applicazione.scelta_non_valida'));
            return redirect()->back();
        }

        $user->assignRole($request->register_as);

        return redirect()->route('frontend.user.dashboard', ['res' => 'ok']);
    }

    public function facebook(Request $request) {
        $user = Auth::user();

        $token = DB::table('social_accounts')->where('user_id', Auth::user()->id)->value('token');

        $id = $request->url;
        $appid = env('FACEBOOK_CLIENT_ID');
        $appsecret = env('FACEBOOK_CLIENT_SECRET');
        $token = $appid . '|' . $appsecret;
        $json_url = 'https://graph.facebook.com/' . $id . '?access_token=' . $token . '&fields=id,name,fan_count';
        $json = @file_get_contents($json_url, true);
        if (!$json) {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Pagina Facebook non valida. Devi avere il ruolo di amministratore per la pagina.'
                            ), 400);
        }

        $json_output = json_decode($json);

        if (isset($json_output->fan_count)) {
            return Response::json(array(
                        'fan_count' => $json_output->fan_count), 200);
        } else {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Url non valido'
                            ), 400);
        }
    }

    public function instagram(Request $request) {
        
        
        $regex = '/(?:(?:http|https):\/\/)?(?:www\.)?(?:instagram\.com|instagr\.am)\/([A-Za-z0-9-_\.]+)/im';
        if ( preg_match( $regex, $request->url, $matches ) ) {

            $instagram_username = $matches[1];

        }
        
        $url = url('/').'/instagram-get-user?user='.$instagram_username.'&g='.uniqid();
        
        $follower = @file_get_contents($url, true);
        
        var_dump( $follower );
        exit;
        
        if (!ctype_digit($follower)) {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Pagina Instagram non valida. '
                            ), 400);
        }
            return Response::json(array(
                        'fan_count' => $follower), 200);
        
    }

    public function youtube(Request $request) {


        $url = $request->url;

        $parsed = parse_url(rtrim($url, '/'));
        if (isset($parsed['path']) && preg_match('/^\/channel\/(([^\/])+?)$/', $parsed['path'], $matches)) {
            $channel_id = $matches[1];
        } else {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Url Youtube non valido'
                            ), 400);
        }
        $appid = env('YOUTUBE_SECRET_KEY');
        $json_url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $channel_id . '&key=' . $appid;

        $json = @file_get_contents($json_url);

        if (!$json) {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Pagina Canale YouTube non valida.'
                            ), 400);
        }

        $json_output = json_decode($json);
        if (isset($json_output->items[0]->statistics->subscriberCount)) {
            return Response::json(array(
                        'fan_count' => $json_output->items[0]->statistics->subscriberCount), 200);
        } else {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Url Youtube non valido'
                            ), 400);
        }
    }

    public function twitter(Request $request) {

        include(app_path() . '/../vendor/twitter/TwitterAPIExchange.php');
        $settings = array(
            'oauth_access_token' => "239773198-06wggW8bmgWrqcTVVPao7IkjFOiHghHjDNlhvumP", // enter your data here
            'oauth_access_token_secret' => "xMDUAyQQjMB7dZvcH0QWVxwo8PnDx041T3s8BiOOB5Rfg", // enter your data here
            'consumer_key' => "xMlpfordBSUEJYPKhlWe6Ow3U", // enter your data here
            'consumer_secret' => "6k5gWdLIBd6TfWB1fWoNGXbDd1cRxaLZ6NLGOpriU5tjPP8iQL"                // enter your data here
        );

        $url = $request->url;
        $uri_parts = explode('/', $url);
        $name = end($uri_parts);
        $ta_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=' . $name; // enter your twitter name without the "@" here
        $requestMethod = 'GET';
        $twitter = new \Twitter\TwitterAPIExchange($settings);
        $follow_count = $twitter->setGetfield($getfield)
                ->buildOauth($ta_url, $requestMethod)
                ->performRequest();

        $data = json_decode($follow_count, true);

        foreach ($data as $tweets) {
            if (isset($tweets['user']['followers_count'])) {
                $followers = $tweets['user']['followers_count'];
            } else {
                return Response::json(array(
                            'success' => false,
                            'errors' => 'Url Twitter non valido'
                                ), 400);
            }
        }
        if (isset($followers)) {
            return Response::json(array(
                        'fan_count' => $followers, 200));
        } else {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'Url Twitter non valido'
                            ), 400);
        }
    }

}
