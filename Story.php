<?php

namespace App\Models;

use App\Models\Auth\User;
use App\Models\StorySave;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use Embera\Embera;

class Story extends Model
{

    protected $table = 'stories';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'content',
        'link',
        'location',
        'tags'
    ];

    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'user_id');
    }

    public function images(){
        return $this->hasMany('App\Models\StoryImage', 'story_id', 'id');
    }

	public function saves(){
        return $this->hasMany('App\Models\StorySave', 'story_id', 'id');
    }

    public function checkOwner($user_id){
        if ($this->user_id == $user_id)return true;
        return false;
    }

    public function hasStory(){
        return $this->has_story;
    }

    public function checkSaves($user_id){
        if ($this->saves()->where('save_user_id', $user_id)->get()->first()){
            return true;
        }else{
            return false;
        }
    }

}