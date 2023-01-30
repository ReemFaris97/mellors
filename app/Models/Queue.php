<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'start','end','game_id','date','queue_minutes'
    ];

    public function games()
    {
        return $this->belongsTo(Game::class,'game_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
