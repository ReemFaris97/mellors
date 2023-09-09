<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideCapacity extends Model
{
   protected $guarded = [];

   public function ride()
    {
        return $this->belongsTo(Ride::class)->withDefault();
    }
}
