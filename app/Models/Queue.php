<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Queue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'start','end','ride_id','date','queue_minutes','park_id','user_id','seats_filled','queue_seconds','time','opened_date'
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
