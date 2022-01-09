<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class PostImage extends Model
{

    protected $table = 'post_images';

    public $timestamps = false;


    public function getURL(){
        return url('/storage/posts/'.$this->image_path);
    }

}