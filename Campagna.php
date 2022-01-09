<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;
use App\Models\App\Categorie;
use App\Models\App\Comuni;
use App\Models\Traits\Uuid;
use App\Models\Auth\User;
use Auth;
use App\Models\App\Richiesta;
use App\Models\App\Offer;
use App\Models\CampagnaLocation;
use App\Models\CampagnaSave;
use App\Models\App\Campagna;
use DB;

class Campagna extends Model {

    use Uuid;

    protected $table = 'campagne';
    protected $fillable = [
        'titolo',
        'canali',
        'descrizione',
        'scambio',
        'tipologia',
        'active',
        'data_fine',
        'data_inizio',
        'budget',
        'budget_periodo',
        'allegati',
        'durata',
        'durata_periodo',
        'display_image'
    ];
    protected $dates = ['data_inizio','data_fine'];
    public function categorie() {
        return $this->belongsToMany(Categorie::class, 'categorie_campagne');
    }

    public function hasCategorie($categorie_id) {
        return in_array($categorie_id, $this->categorie->pluck('id')->toArray());
    }
    
     public function comuni() {
        return $this->belongsToMany(Comuni::class, 'comuni_campagne');
    }

    public function hasComuni($comuni_id) {
        return in_array($comuni_id, $this->comuni->pluck('id')->toArray());
    }

    public function location(){
        return $this->hasOne('App\Models\CampagnaLocation', 'campagna_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function saves(){
        return $this->hasMany('App\Models\CampagnaSave', 'campagna_id', 'id');
    }

    public function richieste() {
        return $this->hasMany(Richiesta::class, 'campagna_id', 'id');
    }

    public function offers() {
        return $this->hasMany(Offer::class, 'campagna_id', 'id');
    }

    public function campagne($stato) {

        if ($stato == 1) {
            $campagne = $this::where('active', 1)->where('data_fine', '>=', date('Y-m-d'));
        } else {
            $campagne = $this::where(function($query){
            $query->where('active', 0)->orWhere('data_fine', '<', date('Y-m-d'));
            });
        }

        /*
        if (Auth::user()->hasRole('brand')) {
            $campagne->where('user_id', Auth::user()->id);
        }
        if (Auth::user()->hasRole('influencer')) {
            $campagne->join('richieste as ri', 'ri.campagna_id', '=', 'campagne.id');
            $campagne->where('ri.influencer_id', Auth::user()->id);
            $campagne->where('ri.accettata', 1);
        }
        */

        $campagne->with('users.dettagli')
                ->orderBy('campagne.created_at', 'DESC');
        return $campagne;
    }


    public function getLocation(){
        return "";
    }

    public function getAddress(){
        $location = $this->location()->first();
        if ($location){
            return $location->address;
        }
    }

    public function distance($user){
        if ($this->id == $user->id) return "";
        if ($user){
            $user_location = $user->location()->get()->first();
            $my_location = $this->location()->get()->first();
            if ($user_location && $my_location){
                return sHelper::distance($my_location->latitud, $my_location->longitud, $user_location->latitud, $user_location->longitud);
            }
        }
        return "";
    }

    public function findNearby($distance=50){
        $location = $this->location()->get()->first();
        if (!$location) return false;
        $lat = $location->latitud;
        $long = $location->longitud;

        if (empty($lat) || empty($long)) return false;
        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
        $campagne = CampagnaLocation::select('campagna_id', 'latitud', 'longitud', 'address',
            DB::raw($raw.' AS distance'))->with('campagne')->where('campagna_id', '!=', $this->id)
            ->havingRaw("distance < $distance")->orderBy('distance', 'ASC')->get();


        return $campagne;
    }

    public function checkSave($user_id){
        if ($this->saves()->where('save_user_id', $user_id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

}
