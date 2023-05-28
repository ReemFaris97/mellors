<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PreopeningList extends Model
{
    protected $fillable = [
        'ride_id',
        'inspection_list_id',
        'list_type',
        'status',
        'comment',
        'created_by_id',
        'park_time_id'
    ];
    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function inspection_list()
    {
        return $this->belongsTo(InspectionList::class,'inspection_list_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function created_by()
    {
        return $this->belongsTo(User::class,'created_by_id')->withDefault([
            'name'=>'not found'
        ]);

    }

}
