<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MaintenanceReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question','answer','comment','date','user_id','park_time_id','park_id'
    ];
}
