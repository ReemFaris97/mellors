<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RsrReportsImages extends Model
{
    protected $fillable = [
        'rsr_report_id','image'
    ];
    public function rsr_report()
    {
        return $this->belongsTo(RsrReport::class,'rsr_report_id')->withTrashed();
    }
}
