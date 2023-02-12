<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomerFeedbackImage extends Model
{
    protected $table = 'customer_feedback_images';

    protected $fillable = [
        'customer_feedback_id','image'
    ];
    public function customer_feedbacks()
    {
        return $this->belongsTo(CustomerFeedbacks::class,'customer_feedback_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
