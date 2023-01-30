<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{

    protected $fillable = [
        'type',
        'game_id',
        'stoppage_reason',
        'date',
        'stopage_sub_category_id'
    ];

    public function stoppageSubCategory()
    {
        return $this->belongsTo(StopageSubCategory::class, 'stopage_sub_category_id', 'id')->withTrashed();
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id')->withTrashed();
    }
}
