<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StopageSubCategory extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'stopage_category_id'];

    public function stoppageCategory()
    {
        return $this->belongsTo(StopageCategory::class,'stopage_category_id','id')->withTrashed();
    }
}
