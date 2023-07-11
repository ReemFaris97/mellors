<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\bcryptPass;
use Illuminate\Database\Eloquent\SoftDeletes;




class User extends Authenticatable
{
    use SoftDeletes;

    use  Notifiable,bcryptPass, HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'department_id',
        'branch_id',
        'first_name',
        'middle_name',
        'last_name',
        'user_number',
        'time_zone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function parks()
    {
        return $this->belongsToMany(Park::class, 'user_parks');
    }
    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'user_zones');
    }
    public function rides()
    {
        return $this->belongsToMany(Ride::class, 'ride_users');
    }


}
