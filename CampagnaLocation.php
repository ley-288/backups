<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CampagnaLocation extends Model
{

    protected $table = 'campagne_locations';

    protected $primaryKey = 'campagna_id';

    public $incrementing = false;

    public $timestamps = false;


    public function city(){
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function campagna(){
        return $this->belongsTo('App\Models\App\Campagna', 'campagna_id');
    }

}
