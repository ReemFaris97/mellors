<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{

    protected $fillable = [
        'game_id',
        'capacity_one_cycle',
        'one_cycle_duration_seconds',
        'ride_cycle_mins',
        'is_flow',
        'ride_price',
        'ride_price_vip',
        'ride_category',
        'date',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id')->withDefault()->withTrashed();
    }
}
