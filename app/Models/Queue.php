<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Queue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id','date','queue_minutes','park_id','user_id','current_queue_occupancy','opened_date','riders_count',
        'current_wait_time','max_queue_capacity','start_time'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

}
