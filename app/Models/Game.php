<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','description','park_id','capacity','cycle_duration_per_second',
        'cycle_duration_load_unload_minutes','is_flow','price','price_vip','game_cat_id','zone_id'
    ];

    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault();

    }
    public function game_cats()
    {
        return $this->belongsTo(GameCategory::class,'game_cat_id')->withDefault();

    }
    public function zones()
    {
        return $this->belongsTo(Zone::class,'zone_id')->withDefault();

    }

}
