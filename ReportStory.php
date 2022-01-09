<?php

namespace App\Models\Reports;


use Illuminate\Database\Eloquent\Model;

class ReportStory extends Model
{

    protected $table = 'reported_stories';

    public $incrementing = false;

    protected $primaryKey = ['story_id', 'reporter_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function story(){
        return $this->belongsTo('App\Models\Story', 'story_id');
    }

     public function reporter(){
        return $this->belongsTo('App\Models\Auth\User', 'reporter_id');
    }


}