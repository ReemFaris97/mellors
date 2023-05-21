<?php

namespace App\Http\Requests\Dashboard\Accident;

use Illuminate\Foundation\Http\FormRequest;

class AccidentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
            $rules = [
                'ride_id'=>'required',
                'comment'=>'required',
                'park_time_id'=>'required',
                'time'=>'required',
            ];

        return $rules;

    }
}
