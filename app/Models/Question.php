<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question','type'
    ];

    public function ride()
    {
        return $this->belongsToMany(Ride::class, 'ride_inspection_lists');
    }
}
