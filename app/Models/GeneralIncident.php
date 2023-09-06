<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralIncident extends Model
{
    protected $guarded = [];
    protected $casts = [
        'value' => 'array',
        'value_2' => 'array',
        'value_3' => 'array',
        'value_4' => 'array',
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault();
    }
    public function park()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault();
    }
}
