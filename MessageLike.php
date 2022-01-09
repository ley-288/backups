<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MessageLike extends Model
{

    protected $table = 'message_likes';

    public $incrementing = false;

    protected $primaryKey = ['message_id', 'like_user_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function post(){
        return $this->belongsTo('App\Models\UserDirectMessages', 'message_id');
    }


    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'like_user_id');
    }

}