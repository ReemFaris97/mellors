<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameTime extends Model
{
    protected $fillable = [
        'start','end','ride_id','date'
    ];

    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
