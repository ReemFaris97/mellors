<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'park_id',
        'branch_id'
    ];

    public function parks()
    {
        return $this->belongsTo(Park::class,'park_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function ride()
    {
        return $this->hasMany(Ride::class,'zone_id','id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function branches()
    {
        return $this->belongsTo(Branch::class,'branch_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_zones');
    }

    public function rides()
    {
        return $this->hasMany(Ride::class,'zone_id','id');

    }


}
