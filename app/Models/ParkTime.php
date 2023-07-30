<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ParkTime extends Model
{

    protected $fillable = [
        'start','end','park_id','date','daily_entrance_count','close_date',
        'duration_time','general_comment','general_weather','temp','description','windspeed_avg'
    ];

    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault([
            'name'=>'not found'
        ]);

    }

    public function rides()
    {
        return $this->hasMany(Ride::class,'park_id','park_id');

    }

    public function cycles()
    {
        return $this->hasMany(RideCycles::class,'park_time_id','id');

    }
}
