<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RideCycles extends Model
{
    protected $fillable = [
        'ride_id','park_id','user_id','riders_count','number_of_vip','park_time_id',
        'number_of_ft','zone_id','number_of_disabled','duration_seconds','sales','start_time','opened_date'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class)->withDefault();
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class,'zone_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
