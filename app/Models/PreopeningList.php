<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreopeningList extends Model
{
    protected $fillable = [
        'game_id',
        'inspection_list',
        'zone_id',
        'user_id'
    ];
}
