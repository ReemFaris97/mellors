<?php

namespace App\Http\Requests\Dashboard\Accident;

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
                'department_id'=>'required',
                'date'=>'required',
                'type_of_event'=>'required',
                'harm'=>'required',
                'name'=>'required',
                'position'=>'required',
                'address'=>'required',
                'phone'=>'required',
                'description'=>'nullable',
                'details'=>'nullable',
                'investigation'=>'required',
                'reportable'=>'required',
                'investigation_level'=>'required',
                'book'=>'required',
                // 'choose'=>'required',
                'ride_id'=>'nullable',
                'park_id'=>'nullable',
                'text'=>'nullable',
            ];

        return $rules;

    }
}
