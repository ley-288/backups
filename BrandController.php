<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\User\BrandRequest;
use App\Models\App\Brand;
use App\Models\Auth\User;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\UserFollowing;
use Illuminate\Support\Facades\Config;
use Session;

class BrandController extends Controller {

    public function edit() {
       
        $profilo = new Brand;
        $user = Auth::user();
       
        if ($profilo::where('id_utente', $user->id)->first()) {
            session()->flash('warning', 'Profilo già creato');
            return redirect(route('frontend.user.dashboard'));
        }
       
        return view('frontend.user.completa-profilo-brand')->with('user', $user);
    }
    
    public function store(BrandRequest $request){
        $user = Auth::user();
        $profilo = new Brand;
        $profilo->terms = $request->terms;
        $utente = User::where('id', Auth::user()->id)->first();
        if ($profilo::where('id_utente', $user->id)->first()) {
            session()->flash('warning', 'Profilo già creato');
            return redirect(route('frontend.user.dashboard'));
        }
        
        $request->request->add(['id_utente' => $user->id]);
        
        $dati = $request->all();
        
        $dati['descrizione'] = clean($dati['descrizione']);
        
        $profilo = Brand::create($dati);
        
        //complete user
        $utente->complete = 1;

        $utente->username = $request->username;
        $utente->b_username = $request->b_username;
        $utente->private = $request->private;
        $utente->birthday = $request->birthday;
        
        //$utente->avatar_location = $request->avatar;

        $spidergain_profile_post = new Post;
        $spidergain_profile_post->user_id = $user->id;
        $spidergain_profile_post->group_id = 0;
        $spidergain_profile_post->content = 'Inizia a condividere i post dei tuoi social anche nella tua Spider bacheca!';
        $spidergain_profile_post->has_image = 0;
        $spidergain_profile_post->spider = 1;
        $spidergain_profile_post->save();

        $spidergain_profile_post = new Post;
        $spidergain_profile_post->user_id = $user->id;
        $spidergain_profile_post->group_id = 0;
        $spidergain_profile_post->content = 'Benvenuto!';
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
        return redirect(route('frontend.user.dashboard', ['res' => 'ok']))->with('flash_success', __('applicazione.profilo_completo'));
    }
    
    public function modifica() {
        $user = Auth::user();
        $profilo = new Brand;
        $profilo = Brand::where('id_utente', Auth::user()->id)->first();
        if (Session::has('user')){
            $user = Session::get('user');
        }else{
            $user = Auth::user();
        }
    
        return view('frontend.user.completa-profilo-brand')->with('profilo', $profilo)->with('user', $user);
    }
    
    public function update(BrandRequest $request) {
        
        $user = Auth::user();
       
        $profilo = new Brand;
        $profilo = Brand::where('id_utente', Auth::user()->id)->first();
        $profilo->terms = $request->terms;

       
        $utente = User::where('id', Auth::user()->id)->first();
        $utente->username = $request->username;
        $utente->b_username = $request->b_username;
        $utente->private = $request->private;
        $utente->birthday = $request->birthday;

        //$utente->avatar_location = $request->avatar;
        
        $utente->save();
        
        $dati = $request->all();
        $dati['descrizione'] = clean($dati['descrizione'] );
        
        $profilo->update($dati);

        session()->flash('flash_success', __('applicazione.profilo_aggiornato'));
        return redirect()->back();
    }
    
    public function getBrand($uuid) {
          $user = User::role('brand')
                ->where('uuid',$uuid)
                ->where('active', 1)
                ->with('dettagli')
                ->firstOrFail();
          if(!isset($user->dettagli)){
              abort(404);
          }
          return view('frontend.user.dettaglio-brand')->with('user',$user);
    }

}
