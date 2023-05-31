<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GameTime extends Model
{

    protected $fillable = [
        'start','end','ride_id','date','close_date','park_id','park_time_id'
    ];

    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }

}
