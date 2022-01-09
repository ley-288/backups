<?php

namespace App\Http\Controllers\Frontend;

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
use Intervention\Image\Facades\Image;
use App\Classes\Slim\Slim;
use Phpfastcache\Helper\Psr16Adapter;


class SocialAccountController extends Controller {

    public function index() {
        
    }

     public function create(Request $request) {
        
        $dettagli = new Dettagli;
        $user = Auth::user();
        //$categorie = Categorie::all();
      
        return view('social.social')->with('user', $user);
    }


    public function store(CreateDettagliRequest $request) {

        $user = Auth::user();
        $dettagli = new Dettagli;
        $utente = User::where('id', Auth::user()->id)->first();
        if ($dettagli::where('id_utente', $user->id)->first()) {
            session()->flash('warning', 'Profilo già creato');
            return redirect(route('frontend.user.dashboard'));
        }
        $request->request->add(['id_utente' => $user->id]);
        $dati = $request->all();
        $dettagli = Dettagli::create($dati);
        //$dettagli->categorie()->attach($request->categorie);
        $utente->save();
        
        return redirect(route('frontend.user.dashboard', ['res' => 'ok']))->with('flash_success', __('applicazione.profilo_completo'));
    }

    
    public function update(Request $request) {
        
        $dettagli = new Dettagli;
        $dettagli = Dettagli::where('id_utente', Auth::user()->id)->first();       
        $user = Auth::user();
        $utente = $user;
        $utente->save();
        $utente = User::where('id', Auth::user()->id);
        $dati = $request->all();
        $dettagli->update($dati);
        //$dettagli->categorie()->sync($request->categorie);
        //$categorie = $dettagli->categorie;

        return redirect()->back();
    }

   
    public function edit(Request $request) {
       
        $user = Auth::user();
        $dettagli = new Dettagli;
        $dettagli = Dettagli::where('id_utente', Auth::user()->id)->with('comuni')->first();
        //$categorie = Categorie::all();
        
        return view('social.social')->with('dettagli', $dettagli)->with('user', $user);
        
    }

}