<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GameTime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'start','end','ride_id','date','close_date'
    ];

    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }

}
