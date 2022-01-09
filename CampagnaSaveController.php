<?php

namespace App\Http\Controllers\Frontend\Campagne;

use App\Models\App\Campagna;
use App\Http\Requests\Frontend\Campagna\StoreCampagna;
use App\Http\Controllers\Controller;
use App\Models\App\Categorie;
use Auth;
use App\Models\Auth\User;
use App\Models\CampagnaLocation;
use App\Models\CampagnaSave;
use Illuminate\Support\Facades\DB;
use App\Models\App\Richiesta;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Request;
use Response;
use App\Mail\RichiestaInviata;
use App\Mail\OffertaInviata;
use App\Mail\OffertaAccettata;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Request;
use App\Models\App\Messaggio;
use App\Models\App\Allegati;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Frontend\Crediti\CreditiController;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use App\Models\App\Visite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Library\GoogleMapsHelper;
use App\Library\sHelper;
use App\Models\City;
use App\Models\Country;

class CampagnaSaveController extends Controller {



    public function saveCampaign(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $campagna = Campagna::find($request->input('id'));

        if ($campagna){
            $campagna_save = CampagnaSave::where('campagna_id', $campagna->id)->where('save_user_id', $user->id)->get()->first();

            if ($campagna_save) { // Unsave
                if ($campagna_save->save_user_id == $user->id) {
                    $deleted = DB::delete('delete from campagne_saved where campagna_id='.$campagna_save->campagna_id.' and save_user_id='.$campagna_save->save_user_id);
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'unsave';
                    }
                }
            }else{
                // save
                $campagna_save = new campagnasave();
                $campagna_save->campagna_id = $campagna->id;
                $campagna_save->save_user_id = $user->id;
                if ($campagna_save->save()){
                    $response['code'] = 200;
                    $response['type'] = 'save';
                }
            }
        }

        return Response::json($response);
    }


}