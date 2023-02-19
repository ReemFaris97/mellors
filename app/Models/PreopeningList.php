<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PreopeningList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id',
        'inspection_list_id',
        'zone_id',
        'user_id','date','comment'
    ];
    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function zones()
    {
        return $this->belongsTo(Zone::class,'zone_id')->withDefault([
            'name'=>'not found'
        ]);

    }

}
