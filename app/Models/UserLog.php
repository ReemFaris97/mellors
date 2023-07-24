<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{

    protected $guarded = [];

    public function ride()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}

