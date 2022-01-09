<?php

namespace App\Http\Controllers\Frontend\Campagne;

use App\Models\App\Campagna;
use App\Models\CampagnaSave;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\Campagne\CampagneController;
use Auth;
use App\Models\App\Offer;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDirectMessage;
use Response;
use App\Mail\RichiestaInviata;
use App\Mail\OffertaInviata;
use App\Mail\OffertaAccettata;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Library\sHelper;
use DB;


class OfferController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function sendOffer(Request $request){

	if($request->offer_type){
		if($request->offer_type == 'accept')
		{ 
			$offer = Offer::where('id', $request->offer_id)->first();
            $offer->message_seller = $request->message_seller;
			$offer->accepted_creator = 1;
			$offer->offer_accepted = date("Y-m-d H:i:s");
			$offer->save();
		}
		else{ 
			$offer = Offer::where('id', $request->offer_id)->first();
            $offer->message_seller = $request->message_seller;
			$offer->refused_creator = 1;
			$offer->save();
		}
		
	}else{
		$user = Auth::user();
		$send_offer = new Offer;
		$send_offer->campagna_id = $request->campaign_id;
		$send_offer->creator_id = $request->creator_id;
		$send_offer->buyer_id = $user->id;
		$send_offer->message = $request->message;
		$send_offer->offer = $request->offer;
        $send_offer->sent_buyer = 1;
		$send_offer->save();

         $campagna = $request->campaign_id;
        $save_check = CampagnaSave::where('campagna_id', $campagna)->where('save_user_id', $user->id)->get()->first();
        if (!$save_check){
           
            
            //$campagna_save = new campagnasave();
            $campagna_save = new CampagnaSave();
            $campagna_save->campagna_id = $campagna;
            $campagna_save->save_user_id = $user->id;
            $campagna_save->save();
        }
	}
        
        return redirect()->back()->with('success', 'Sent');

    }


    public function newOffers(Request $request){
        $user = Auth::user();
        $offer = DB::table('offers')->get('*');
        $my_offers = DB::table('offers')
            ->select('offers.*','users.*', 'campagne.*','offers.id as offer_id')
            ->where('offers.creator_id', $user->id)
            ->where('offers.sent_creator', null)
            ->where('offers.accepted_creator', null)
            ->where('offers.refused_creator', null)
            ->join('users', 'users.id', 'offers.buyer_id')
            ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
            ->get();

        $history = DB::table('offers')
            ->where('offers.creator_id', $user->id)
           // ->select('offers.*','users.*', 'campagne.*','offers.id as offer_id')
            ->where('offers.accepted_creator', '!=' ,null)
            ->orWhere('offers.refused_creator', '!=' ,null)
            ->join('users', 'users.id', 'offers.creator_id')
            ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
            ->get();

        $update_all = DB::table('offers')
                ->where('creator_id', $user->id)
                ->where('offers.seen_creator', null)
                ->update(['offers.seen_creator' => 1]);

        return view('frontend.campagne.offers', compact('user', 'offer', 'my_offers', 'history'));

    }

}

