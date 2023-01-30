<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait ImageOperations
{

    public function setImageAttribute($image)
    {
        if (!is_null($image) and is_file($image))
            $this->attributes['image'] = uploadImage('uploads', $image);
        else
            $this->attributes['image'] = $image;
    }


    public function getImageAttribute($image)
    {
        if (is_null($image)or $image=='')
            return asset('_admin/assets/images/logo.png');
        else
            return asset($image);
    }


}
