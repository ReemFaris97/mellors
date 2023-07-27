<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $guarded = [];

    public function ride()
    {
        return $this->belongsTo(Ride::class)->withDefault();
    }
}

