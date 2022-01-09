<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserHobby extends Model
{

    protected $table = 'user_hobbies';

    protected $primaryKey = ['user_id', 'hobby_id'];

    protected $fillable = [
        'admin_id',
        'seen'
    ];

    public $incrementing = false;

    public $timestamps = false;


    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'user_id');
    }

    public function hobby(){
        return $this->belongsTo('App\Models\Hobby', 'hobby_id');
    }
}