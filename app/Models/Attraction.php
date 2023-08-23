<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $guarded = [];
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }
    public function ride()
    {
        return $this->belongsTo(Ride::class, 'ride_id', 'id')->withDefault(['name'=>'not found']);
    }
    public function park()
    {
        return $this->belongsTo(Park::class, 'park_id', 'id');
    }
    public function approve_by()
    {
        return $this->belongsTo(User::class, 'approve_by_id', 'id');
    }
  
}
