<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    protected $fillable = [
        'name','branch_id'
    ];
    public function branches()
    {
        return $this->belongsTo(Branch::class,'branch_id')->withDefault([
            'name'=>'not found'
        ]);

    }
}
