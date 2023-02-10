<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ParkTime extends Model
{

    protected $fillable = [
        'start','end','park_id','date','daily_entrance_count','close_date'
    ];

    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
