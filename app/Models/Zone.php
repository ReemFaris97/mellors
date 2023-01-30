<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'name',
        'park_id',
        'zone_supervisor'
    ];

    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function users()
    {
        return $this->belongsTo(User::class,'zone_supervisor')->withDefault([
            'name'=>'not found'
        ]);

    }

}
