<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideOpsReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'question','answer','comment','date','user_id','park_time_id','park_id','color'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
