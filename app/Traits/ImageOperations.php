<?php


namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageOperations
{

    public function setImageAttribute($image)
    {
        if (!is_null($image) and is_file($image))
            $this->attributes['image'] = $this->uploadImage('uploads', $image);
        else
            $this->attributes['image'] = $image;
    }


    public function getImageAttribute($image)
    {
        if (is_null($image) or $image == '')
            return asset('_admin/assets/images/logo.png');
        else

            return $this->getimg($image);
    }


    function uploadImage($file, $img)
    {
        return '/storage/' . \Storage::disk('public')->putFile($file, $img);
    }

    function getimg($filename)
    {
        if (!empty($filename)) {
            $base_url = url('/');
/*             return $base_url . '/../storage/app/public/' . $filename;
 */        
               return $base_url . '/storage/' . $filename;

} else {
            return '';
        }

    }

    public function Gallery($request, $model, $item)
    {
        foreach ($request['images'] as $key => $image) {
        /*   //  $imageName = $path = \Storage::disk('public')->putFile('photos', $image['file']);
            $imageName =time().$image['file']->getClientOriginalName();
            Storage::putFile('images',$image['file'],$imageName); */
            $path= Storage::disk('s3')->put('images',$image['file']);

            $model->create(['image' => $path, 'comment' => $image['comment']] + $item);

        } 
    }
    public function Images($request, $model, $item)
    {
        foreach ($request['image'] as $key => $image) {
            $path= Storage::disk('s3')->put('images',$image);
          
           $model->create(['image' => $path] + $item);

        }


} 
}