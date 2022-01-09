<?php

namespace App\Models\Reports;


use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{

    protected $table = 'blocked_users';

    public $incrementing = false;

    protected $primaryKey = ['blocker_id', 'blocked_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function blocker(){
        return $this->belongsTo('App\Models\Auth\User', 'blocker_id');
    }

     public function blocked(){
        return $this->belongsTo('App\Models\Auth\User', 'blocked_id');
    }


}