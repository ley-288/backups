<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{

    protected $table = 'comment_likes';

    public $incrementing = false;

    protected $primaryKey = ['comment_id', 'like_user_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }


    public function comment(){
        return $this->belongsTo('App\Models\PostComment', 'post_id');
    }


    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'commentlike_user_id');
    }

}