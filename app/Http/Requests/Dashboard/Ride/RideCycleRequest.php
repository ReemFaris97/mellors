<?php

namespace App\Http\Requests\Dashboard\Ride;

use Illuminate\Foundation\Http\FormRequest;

class RideCycleRequest extends FormRequest
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
        return [
            'ride_id'=>'required',
            'park_id'=>'required',
            'user_id'=>'required',
            'seats_filled'=>'required',
            'number_of_vip'=>'required',
            'number_of_disabled'=>'required',
            'cycle_time_minute'=>'required',
            'ride_price'=>'required',
            'ride_price_vip'=>'required',
            'ride_price_new'=>'required',
            'ride_price_vip_new'=>'required',
            'sales'=>'required',
            'date'=>'nullable',
            'time'=>'nullable',
            'opened_date'=>'nullable',


        ];
    }
}
