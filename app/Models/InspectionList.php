<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InspectionList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','comment'
    ];

    public function ride()
    {
        return $this->belongsToMany(Ride::class, 'ride_inspection_lists');
    }
}
