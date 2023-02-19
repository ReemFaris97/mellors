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
        'ride_cycle_mins',
        'is_flow',
        'ride_price',
        'ride_price_vip',
        'ride_category',
        'date',
        'zone_id',
        'park_id',
        'game_cat_id'
    ];

    public function park()
    {
        return $this->belongsTo(Park::class, 'park_id', 'id')->withDefault()->withTrashed();
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id', 'id')->withDefault()->withTrashed();
    }
    public function category()
    {
        return $this->belongsTo(GameCategory::class, 'game_cat_id', 'id')->withDefault()->withTrashed();
    }

    public function inspection_list()
    {
        return $this->belongsToMany(InspectionList::class, 'ride_inspection_lists');
    }
    public function preopening_list()
    {
        return $this->belongsToMany(InspectionList::class, 'preopening_lists');
    }
}
