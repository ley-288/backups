<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

    protected $table = 'comment_replies';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'reply_user_id');
    }

    public function comment(){
        return $this->belongsTo('App\Models\PostComment', 'comment_id');
    }

   // public function likes(){
   //     return $this->hasMany('App\Models\CommentLike', 'comment_id', 'id');
   // }

   // public function getCommentLikeCount(){
   //     if ($this->like_count == null){
   //         $this->like_count = $this->likes()->count();
   //     }
   //     return $this->like_count;
   // }

   // public function checkCommentLike($user_id){
   //     if ($this->likes()->where('like_user_id', $user_id)->get()->first()){
   //         return true;
   //     }else{
   //         return false;
   //     }
   // }

}