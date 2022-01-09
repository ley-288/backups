<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\App\Richiesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;



/**
 * Class DashboardController.
 */
class DashboardController extends Controller {

    
    public function index_test(){
        //$token = Socialite::driver('facebook')->user()->token;
        $token = DB::table('social_accounts')->where('user_id',Auth::user()->id)->value('token');
        $id = 'https://www.facebook.com/liquoripassaro';
        $appid = env('FACEBOOK_CLIENT_ID');
        $appsecret = env('FACEBOOK_CLIENT_SECRET');
        $json_url ='https://graph.facebook.com/id='.$id.'?access_token='.$token.'&fields=id,name,fan_count';
        $json = file_get_contents($json_url);
        $json_output = json_decode($json);
        dd($json_output);
  
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $user = Auth::user(); 

        $messaggi = DB::table('messaggi as me')
                    ->join('campagne as ca','ca.id','=','me.campagna_id')
                    ->join('richieste as ri','ca.id','=','ri.campagna_id')
                    ->join('users as u','me.autore_id','=','u.id')
                    ->where('me.autore_id','!=',Auth::user()->id)
                    ->where('me.letto', 0)
                    ->where('me.chat', 1)
                    ->where('ca.data_fine','>=',date('Y-m-d'))
                    ->where('ca.active',1);
                    if(Auth::user()->hasRole('influencer')){                
                      $messaggi->where('me.chat_influencer_id',Auth::user()->id);
                    } else{
                         $messaggi=$messaggi->where('ca.user_id',Auth::user()->id);
                    }
                    $messaggi = $messaggi->groupBy('ca.id','u.avatar_location','u.last_name','u.first_name','ca.titolo','ca.uuid','me.created_at','u.uuid')
                            ->orderBy('me.created_at','DESC')
                            ->select('u.avatar_location','u.last_name','u.first_name','ca.titolo','ca.uuid','me.created_at','u.uuid as u_uuid')
                            ->get();


        $offers = DB::table('richieste')
            ->where('brand_id', Auth::user()->id)
            ->join('users', 'users.id', '=', 'richieste.influencer_id')
            ->join('campagne', 'campagne.id', '=', 'richieste.campagna_id')
            ->get('*');
       
        
        if (Auth::user()->hasRole('brand')) {

            $richieste = Richiesta::where('brand_id', Auth::user()->id)
                    ->where('accettata', '1')
                    ->whereNull('offerta_accettata')
                    ->whereNull('offerta_rifiutata')
                    ->whereHas('users', function($q) {
                        $q->where('active', 1);
                    })
                    ->whereHas('campagne', function($q) { 
                        $q->where('active', 1);
                    })
                    ->get();

            return view('frontend.user.dashboard')->with('richieste', $richieste)->with('messaggi',$messaggi)->with('offers', $offers);
            
        } else {

                $richieste = Richiesta::where('influencer_id', Auth::user()->id)
                    ->where('accettata', 0)
                    ->where('ca.data_fine', '>', date('Y-m-d'))
                    ->where('u.active',1)
                    ->join('campagne as ca', 'ca.id', '=', 'richieste.campagna_id')
                    ->join('users as u', 'u.id', '=', 'ca.user_id')
                    ->count();

                return view('frontend.user.dashboard')->with('messaggi',$messaggi)->with('richieste',$richieste)->with('offers', $offers);
            
        } 
            
                  

        return view('frontend.user.dashboard')->with('messaggi',$messaggi)->with('richieste',$richieste)->with('offers', $offers);
         
       

    }
    
    
    
    
    
    
    
    
    
    
    

}
