<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreopeningList extends Model
{
    protected $fillable = [
        'ride_id',
        'inspection_list',
        'zone_id',
        'user_id'
    ];
    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function zones()
    {
        return $this->belongsTo(Zone::class,'zone_id')->withDefault([
            'name'=>'not found'
        ]);

    }

}
