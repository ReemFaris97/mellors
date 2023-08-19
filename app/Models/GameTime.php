<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GameTime extends Model
{

    protected $fillable = [
        'start','end','ride_id','date','close_date','park_id','park_time_id','first_status'
        ,'second_status','comment','no_of_gondolas','no_of_seats','user_id','verified_by_id','status'
    ];

    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by_id', 'id');
    } 
    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault([
            'name'=>'not found'
        ]);

    }

}
