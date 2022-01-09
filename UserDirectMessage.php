<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Embera\Embera;

class UserDirectMessage extends Model
{

    protected $table = 'user_direct_messages';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function dataImport($data = [])
    {

        foreach($data as $key => $value) {
            $this->$key = $value;
        }

    }

    private $like_count = null;

    public function sender(){
        return $this->belongsTo('App\Models\Auth\User', 'sender_user_id');
    }

    public function receiver(){
        return $this->belongsTo('App\Models\Auth\User', 'receiver_user_id');
    }

     public function images(){
        return $this->hasMany('App\Models\MessageImage', 'message_id', 'id');
    }
    
     public function likes(){
        return $this->hasMany('App\Models\MessageLike', 'message_id', 'id');
    }

    public function hasImage(){
        return $this->has_image;
    }

    public function getLikeCount(){
        if ($this->like_count == null){
            $this->like_count = $this->likes()->count();
        }
        return $this->like_count;
    }

    public function checkLike($user_id){
        if ($this->likes()->where('like_user_id', $user_id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }


}