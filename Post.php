<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Embera\Embera;
use App\Models\PostLocation;
use App\Library\sHelper;

class Post extends Model
{

    protected $table = 'posts';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'azienda',
        'influencer',
        'both_visible',
        'content',
        'link',
        'location',
        'tags',
        'hashthags'
    ];

    private $like_count = null;
    private $comment_count = null;

    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'user_id');
    }

    public function images(){
        return $this->hasMany('App\Models\PostImage', 'post_id', 'id');
    }

    public function comments(){
        return $this->hasMany('App\Models\PostComment', 'post_id', 'id');
    }

    public function likes(){
        return $this->hasMany('App\Models\PostLike', 'post_id', 'id');
    }

    public function tags(){
        return $this->hasMany('App\Models\PostTag', 'post_id', 'id');
    }

    public function hashtags(){
        return $this->hasMany('App\Models\PostHashtag', 'post_id', 'id');
    }

    public function location(){
        return $this->hasOne('App\Models\PostLocation', 'post_id', 'id');
    }

    public function getLikeCount(){
        if ($this->like_count == null){
            $this->like_count = $this->likes()->count();
        }
        return $this->like_count;
    }

    public function getCommentCount(){
        if ($this->comment_count == null){
            $this->comment_count = $this->comments()->count();
        }
        return $this->comment_count;
    }

    public function checkOwner($user_id){
        if ($this->user_id == $user_id)return true;
        return false;
    }

    public function hasImage(){
        return $this->has_image;
    }

    public function checkLike($user_id){
        if ($this->likes()->where('like_user_id', $user_id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

     public function getLocation(){
        return "";
    }

    public function getAddress(){
        $location = $this->location()->first();
        if ($location){
            return $location->address;
        }
    }

}