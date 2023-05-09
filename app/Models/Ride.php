<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ride extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'capacity_one_cycle',
        'one_cycle_duration_seconds',
        'ride_price',
        'ride_price_ft',
        'ride_type_id',
        'zone_id',
        'park_id',
        'ride_cat',
        'theoretical_number',
        'description',
        'ride_cycle_mins',
        'minimum_height_requirement',
        'number_of_seats'
    ];

    public function park()
    {
        return $this->belongsTo(Park::class, 'park_id', 'id')->withDefault()->withTrashed();
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id', 'id')->withDefault()->withTrashed();
    }

    public function ride_type()
    {
        return $this->belongsTo(RideType::class, 'ride_type_id', 'id')->withDefault()->withTrashed();
    }

    public function inspection_list()
    {
        return $this->belongsToMany(InspectionList::class, 'ride_inspection_lists');
    }

    public function preopening_list()
    {
        return $this->belongsToMany(InspectionList::class, 'preopening_lists');
    }

    public function rideStoppages()
    {
        return $this->hasMany(RideStoppages::class, 'ride_id', 'id');
    }
}
