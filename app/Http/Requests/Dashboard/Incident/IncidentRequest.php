<?php

namespace App\Http\Requests\Dashboard\Incident;

use Illuminate\Foundation\Http\FormRequest;

class IncidentRequest extends FormRequest
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
                'date'=>'required',
            ];

        return $rules;

    }
}
