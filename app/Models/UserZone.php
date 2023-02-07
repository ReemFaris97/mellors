<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserZone extends Model
{
    protected $fillable = [
        'user_id','zone_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id')->withDefault([
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
