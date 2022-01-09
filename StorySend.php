<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class StorySend extends Model
{

    protected $table = 'video_send';

    public $incrementing = false;

    protected $primaryKey = ['story_id', 'influencer_id', 'azienda_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function story(){
        return $this->belongsTo('App\Models\Story', 'story_id');
    }

    public function influencer(){
        return $this->belongsTo('App\Models\Auth\User', 'influencer_id');
    }

    public function azienda(){
        return $this->belongsTo('App\Models\Auth\User', 'azienda_id');
    }


}