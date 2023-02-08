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
        return [
            'ride_id'=>'required',
            'ride_status'=>'required',
            'stopage_sub_category_id'=>'required',
            'ride_notes'=>'nullable',
            'date'=>'nullable',
            'time'=>'nullable',
            'opened_date'=>'nullable',
            'date_time'=>'nullable',
            'down_minutes'=>'nullable',
            'user_id'=>'required'
        ];
    }
}
