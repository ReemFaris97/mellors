<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Accident extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id','comment','park_time_id','user_id','time'
    ];
    public function ride()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }
    public function park_time()
    {
        return $this->belongsTo(ParkTime::class,'park_time_id')->withDefault();
    }
}
