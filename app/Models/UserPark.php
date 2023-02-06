<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPark extends Model
{
    protected $fillable = [
        'user_id','park_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault([
            'name'=>'not found'
        ]);

    }

}
