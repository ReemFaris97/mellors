<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Incident extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id','comment','date','user_id'
    ];
    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault();
    }
}
