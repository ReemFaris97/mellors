<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedFlag extends Model
{
    protected $fillable = [
        'ride','type','issue','park_time_id','date'
    ];
}
