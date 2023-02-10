<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerFeedbacks extends Model
{    use SoftDeletes;

    protected $fillable = [
        'comment','type','ride_id','date'
    ];

    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
