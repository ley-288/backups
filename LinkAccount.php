<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class LinkAccount extends Model
{

    protected $table = 'linked_accounts';

    public $incrementing = false;

    protected $primaryKey = ['azienda_id', 'linked_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\Auth\User', 'linked_id');
    }

}