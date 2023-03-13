<?php

namespace App\Models;
use App\Traits\ImageOperations;

use Illuminate\Database\Eloquent\Model;


class CustomerFeedbackImage extends Model
{
    use ImageOperations;

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
