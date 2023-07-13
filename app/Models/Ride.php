<?php

namespace App\Models;

use Carbon\Carbon;
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
        'user_id',
        'ride_cat',
        'theoretical_number',
        'description',
        'ride_cycle_mins',
        'minimum_height_requirement',
        'number_of_seats',
        'no_of_gondolas'
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

    public function times()
    {
        return $this->hasMany(GameTime::class, 'ride_id', 'id')
            ->where('date', '<=', Carbon::now()->toDateString())->where('close_date', '>=', Carbon::now()->toDateString());
    }
    public function preopening_lists()
    {
        return $this->hasMany(PreopeningList::class, 'ride_id', 'id');
    }

    public function queue()
    {
        return $this->hasOne(Queue::class, 'ride_id', 'id')->orderBy('id','DESC');
    }
    public function cycle()
    {
        return $this->hasMany(RideCycles::class, 'ride_id', 'id');
    }
}
