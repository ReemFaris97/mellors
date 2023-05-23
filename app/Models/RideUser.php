<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RideUser extends Model
{
    protected $fillable = [
        'ride_id','user_id'
    ];
}
