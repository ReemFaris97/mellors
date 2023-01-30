<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerFeedbacks extends Model
{
    protected $fillable = [
        'comment','type','game_id','date'
    ];

    public function games()
    {
        return $this->belongsTo(Game::class,'game_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
