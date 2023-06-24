<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StopageCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function sub_categories(){
        return $this->hasMany(StopageSubCategory::class,'stopage_category_id','id');
    }
}
