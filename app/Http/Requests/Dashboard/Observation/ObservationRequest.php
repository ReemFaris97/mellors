<?php

namespace App\Http\Requests\Dashboard\Observation;

use Illuminate\Foundation\Http\FormRequest;

class ObservationRequest extends FormRequest
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
        'date_resolved'=>'required',
        'maintenance_feedback'=>'required',
        'rf_number'=>'nullable',
        'department_id'=>'nullable',
        'reported_on_tech_sheet'=>'nullable',
    ];
        
        return $rules;

    }
}
