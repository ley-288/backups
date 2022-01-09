<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class MessageImage extends Model
{

    protected $table = 'message_images';

    public $timestamps = false;


    public function getURL(){
        return url('/storage/messages/'.$this->image_path);
    }

}