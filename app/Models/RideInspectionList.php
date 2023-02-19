<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class RideInspectionList extends Model
{

    protected $fillable = [
        'ride_id','inspection_list_id'
    ];
    public function inspection_list()
    {
        return $this->belongsTo(InspectionList::class, 'inspection_list_id', 'id')->withTrashed();
    }
}
