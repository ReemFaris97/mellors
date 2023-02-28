<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Park extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'branch_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_parks');
    }

    public function branches()
    {
        return $this->belongsTo(Branch::class, 'branch_id')->withDefault([
            'name' => 'not found'
        ]);

    }

    public function parkTimes()
    {
        return $this->hasMany(ParkTime::class, 'park_id', 'id');
    }

    public function rides()
    {
        return $this->hasMany(Ride::class, 'park_id', 'id');
    }
}
