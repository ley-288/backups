<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PostLocation extends Model
{

    protected $table = 'post_locations';

    public $incrementing = false;

    public $timestamps = false;


    public function city(){
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

}
