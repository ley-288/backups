<?php

namespace App\Models\Reports;


use Illuminate\Database\Eloquent\Model;

class ReportCampaign extends Model
{

    protected $table = 'reported_campaigns';

    public $incrementing = false;

    protected $primaryKey = ['campaign_id', 'reporter_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function message(){
        return $this->belongsTo('App\Models\App\Campagna', 'campaign_id');
    }

     public function reporter(){
        return $this->belongsTo('App\Models\Auth\User', 'reporter_id');
    }


}