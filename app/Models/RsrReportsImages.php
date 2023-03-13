<?php

namespace App\Models;
use App\Traits\ImageOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RsrReportsImages extends Model
{
    use HasFactory,ImageOperations;

    protected $fillable = [
        'rsr_report_id','image','comment'
    ];
    public function rsr_report()
    {
        return $this->belongsTo(RsrReport::class,'rsr_report_id')->withTrashed();
    }
}
