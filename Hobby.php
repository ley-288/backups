<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{

    protected $table = 'hobbies';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'category'
    ];

    public function users(){
        return $this->hasMany('App\Models\Auth\User', 'user_id');
    }


}