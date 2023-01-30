<?php


namespace App\Traits;


trait bcryptPass
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
