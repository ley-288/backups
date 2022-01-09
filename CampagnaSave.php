<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CampagnaSave extends Model
{

    protected $table = 'campagne_saved';

    public $incrementing = false;

    protected $primaryKey = ['campagna_id', 'save_user_id'];

    /*protected $fillable = [
        'campagna_id',
        'save_user_id'
    ];*/

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function post(){
        return $this->belongsTo('App\Models\App\Campagna', 'campagna_id');
    }


    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'save_user_id');
    }

}