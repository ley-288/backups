<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class StoryImage extends Model
{

    protected $table = 'story_images';

    public $timestamps = false;


    public function getURL(){
        return url('/storage/stories/'.$this->image_path);
    }

}