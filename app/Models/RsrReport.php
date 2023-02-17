<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RsrReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ride_id',
        'created_by_id',
        'verified_by_id',
        'ride_performance_details',
        'ride_inspection',
        'corrective_actions_taken',
        'conclusion',
        'date',
        'type',
        'status'
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }
    public function rides()
    {
        return $this->belongsTo(Ride::class, 'ride_id', 'id');
    }
    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by_id', 'id');
    }
    public function rsr_images()
    {
        return $this->hasMany(RsrReportsImages::class,'rsr_report_id');
    }
}
