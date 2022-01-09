<?php

namespace App\Models\Reports;


use Illuminate\Database\Eloquent\Model;

class ReportMessage extends Model
{

    protected $table = 'reported_messages';

    public $incrementing = false;

    protected $primaryKey = ['message_id', 'reporter_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function message(){
        return $this->belongsTo('App\Models\UserDirectMessage', 'message_id');
    }

     public function reporter(){
        return $this->belongsTo('App\Models\Auth\User', 'reporter_id');
    }


}