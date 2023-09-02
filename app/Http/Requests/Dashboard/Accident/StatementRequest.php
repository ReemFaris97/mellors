<?php

namespace App\Http\Requests\Dashboard\Accident;

use Illuminate\Foundation\Http\FormRequest;

class StatementRequest extends FormRequest
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
                'witness_statement'=>'required',
                'time'=>'required',
                'witness_name'=>'required',
                'witness_phone'=>'required',
                'witness_position'=>'required',
                'statement'=>'required',
                'choose'=>'required',
                'ride_id'=>'nullable',
                'park_id'=>'nullable',
                'zone_id'=>'nullable',
                'text'=>'nullable',
            ];

        return $rules;

    }
}
