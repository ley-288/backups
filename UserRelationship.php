<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserRelationship extends Model
{

    protected $table = 'user_relationship';

    public $timestamps = false;


    public function relative(){
        return $this->belongsTo('App\Models\Auth\User', 'related_user_id');
    }

    public function main(){
        return $this->belongsTo('App\Models\Auth\User', 'main_user_id');
    }

    public function getAllow(){
        return $this->allow;
    }

    public function getType(){
        if ($this->relation_type == 0){
            return "Amici";
        }else if($this->relation_type == 1){
            return "Franchise";
        }else{
            return "Relative";
        }
    }
}