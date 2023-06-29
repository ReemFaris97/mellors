<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Queue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id','date','queue_minutes','park_id','user_id','current_queue_occupancy','opened_date','riders_count',
        'current_wait_time','max_queue_capacity','start_time','park_time_id','zone_id','queue_seconds'
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
