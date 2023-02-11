<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomerFeedbacks extends Model
{
    protected $fillable = [
        'comment','type','ride_id','date'
    ];

    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
