<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MaintenanceRideStatusReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id','status','comment','date','park_time_id','maintenance_report_id'
    ];
}
