<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Models\App\Campagna;

class Offer extends Model
{
    protected $table = 'offers';
     
     //protected $dates = ['data_inizio','data_fine'];
     
    protected $fillable = ['creator_id','buyer_id', 'message', 'offer'];
     
    public function users(){
        return $this->belongsTo(User::class,'buyer_id','id');
    }
    
    public function campagne(){
        return $this->belongsTo(Campagna::class,'campagna_id','id');
    }
}
