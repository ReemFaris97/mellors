<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttractionInfo extends Model
{
    protected $guarded = [];

    public function question(){
        return $this->belongsTo(GeneralQuestion::class,'general_question_id');
    }
}
