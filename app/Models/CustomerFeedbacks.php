<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomerFeedbacks extends Model
{
    protected $fillable = [
        'comment','type','ride_id','date','is_skill_game','park_id','zone_id','complaint_id'
    ];
    public function complaint()
    {
        return $this->belongsTo(CustomerComplaint::class,'complaint_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function zones()
    {
        return $this->belongsTo(Zone::class,'zone_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function images()
    {
        return $this->hasMany(CustomerFeedbackImage::class,'customer_feedback_id');
    }
}
