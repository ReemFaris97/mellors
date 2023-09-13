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
    public function preopeningLists()
    {
        return $this->hasMany(PreopeningList::class,'park_time_id','id');

    }

    public function healthAndSafetyReports()
    {
        return $this->hasOne(HealthAndSafetyReport::class,'park_time_id','id');

    }
    public function maintenanceReports()
    {
        return $this->hasOne(MaintenanceReport::class,'park_time_id','id');

    }
    public function gameTimes()
    {
        return $this->hasMany(GameTime::class,'park_time_id','id');

    }
    public function skillGameReports()
    {
        return $this->hasOne(SkillGameReport::class,'park_time_id','id');

    }
    public function techReports()
    {
        return $this->hasOne(TechReport::class,'park_time_id','id');

    }
    public function rideStoppages()
    {
        return $this->hasMany(RideStoppages::class,'park_time_id','id');

    }
    public function rideOpsReport()
    {
        return $this->hasOne(RideOpsReport::class,'park_time_id','id');

    } 
    public function attraction()
    {
        return $this->hasOne(Attraction::class,'park_time_id','id');

    }

}
