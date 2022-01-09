<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{

    protected $table = 'post_tags';

    public $incrementing = false;

    protected $primaryKey = ['post_id', 'tag_id'];

    protected $fillable = [
        'post_id',
        'tag_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }


    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'tag_id');
    }

}