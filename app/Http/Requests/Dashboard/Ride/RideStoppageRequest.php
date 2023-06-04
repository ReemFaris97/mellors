<?php

namespace App\Http\Requests\Dashboard\Ride;

use Illuminate\Foundation\Http\FormRequest;

class RideStoppageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
//        dd("ggg");
        return [
            'ride_id'=>'nullable',
            'park_time_id'=>'nullable',
            'stoppage_status'=>'required',
            'stopage_sub_category_id'=>'required',
            'ride_notes'=>'nullable',
            'date_time'=>'nullable',
            'down_minutes'=>'nullable',
            'description'=>'nullable',
            'type'=>'required',
            'images.*'=>'nullable',
            'date'=>'nullable',
            'stopage_category_id'=>'nullable'
        ];
        
        if ($this->getMethod() == 'PATCH') {
            $rules = [
            'stoppage_status'=>'required',
            'stopage_sub_category_id'=>'required',
            'ride_notes'=>'nullable',
            'date_time'=>'nullable',
            'down_minutes'=>'nullable',
            'description'=>'nullable',
            'type'=>'required',
            'images.*'=>'nullable',
            'date'=>'nullable',
            'stopage_category_id'=>'required'       
               ];
        }
    }
}
