<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TechRideDownReport extends Model
{
    protected $fillable = [
        'ride_down_id','comment','lead_name','date_expected_open','tech_report_id','park_time_id'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class,'ride_down_id')->withDefault();
    }
}
