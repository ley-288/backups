<?php

namespace App\Models\Reports;


use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{

    protected $table = 'reported_users';

    public $incrementing = false;

    protected $primaryKey = ['user_id', 'reporter_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'user_id');
    }

     public function reporter(){
        return $this->belongsTo('App\Models\Auth\User', 'reporter_id');
    }


}