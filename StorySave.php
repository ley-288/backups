<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class StorySave extends Model
{

    protected $table = 'stories_saved';

    public $incrementing = false;

    protected $primaryKey = ['story_id', 'save_user_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function story(){
        return $this->belongsTo('App\Models\Story', 'story_id');
    }


    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'save_user_id');
    }

}