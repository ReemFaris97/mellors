<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameTime extends Model
{
    protected $fillable = [
        'start','end','game_id','date'
    ];

    public function games()
    {
        return $this->belongsTo(Game::class,'game_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
