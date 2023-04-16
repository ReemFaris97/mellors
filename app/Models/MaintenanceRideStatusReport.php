<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MaintenanceRideStatusReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id','status','comment','date','park_id','maintenance_report_id'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault();
    }

}
