<?php

namespace App\Models\Reports;


use Illuminate\Database\Eloquent\Model;

class ReportPost extends Model
{

    protected $table = 'reported_posts';

    public $incrementing = false;

    protected $primaryKey = ['post_id', 'reporter_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'reporter_id');
    }


}