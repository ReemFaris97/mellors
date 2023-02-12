<?php


namespace App\Http\Helpers;

class Helpers
{
    /**
     * Setting Name
     * @param $name
     * @return mixed
     */
    function getsetting($name)
    {
        $setting = \App\Setting::where('name', $name)->first();
        return $setting->value();
    }

    /**
     * Upload Path
     * @return string
     */
    function uploadpath()
    {
        return 'photos';
    }

    /**
     * Get Image
     * @param $filename
     * @return string
     */
    function getimg($filename)
    {
        $base_url = url('/');
        return $base_url . '/storage/' . $filename;
    }

    /**
     * Upload an image
     * @param $img
     */
    function uploader($request, $img_name)
    {
        $path = \Storage::disk('public')->putFile(uploadpath(), $request->file($img_name));
        return $path;
    }

    function deleteImg($img_name)
    {
        \Storage::disk('public')->delete(uploadpath(), $img_name);
        return True;
    }

    function multiUploaderWithmodelproduct($request, $img_name, $model, $onId = null, $lawyer_id)
    {
        $images = [];
        $i = 0;
        foreach ($request[$img_name] as $image) {
            $path = \Storage::disk('public')->putFile(uploadpath(), $image);
            $images[$i] = $path;
            $i++;
            $model->create(['image' => $path, '$customer_feedback_id' => $lawyer_id,]);
        }
        return $images;
    }


    function status()
    {
        $array = [
            '1' => 'مفعل',
            '0' => 'غير مفعل',
        ];
        return $array;
    }


    function cities()
    {
        $cities = App\City::all()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['ar_name']];
        });
        return $cities;
    }


    function countries()
    {
        $countries = App\Country::all()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['ar_name']];
        });
        return $countries;
    }


    function GenerateCode()
    {
        $code = str_random(6); // better than rand()
        // call the same function if the barcode exists already
        if (UniqueCode($code)) {
            return GenerateCode();
        }
        // otherwise, it's valid and can be used
        return $code;
    }

    function UniqueCode($code)
    {
        return \App\Coupon::where('code', $code)->first();
    }

    function fcm_server_key()
    {
        return 'AAAAdTgp7Lk:APA91bEdECFg296xuJhdtocpK6SIENoV8h3_vMF7zQSGwNeBv2bMhXOzOlMA_yXx6Z2Xv7ECEWnMZZYSK5xwoab0N77FkCs90st20QxR8gWKBsTbJbviu29YguAEiOzqnEQhTYBiDGuZ';
    }
}