<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomerFeedbacks extends Model
{
    protected $fillable = [
        'comment','type','ride_id','date','is_skill_game'
    ];

    public function rides()
    {
        return $this->belongsTo(Ride::class,'ride_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function images()
    {
        return $this->hasMany(CustomerFeedbackImage::class,'customer_feedback_id');
    }
}
