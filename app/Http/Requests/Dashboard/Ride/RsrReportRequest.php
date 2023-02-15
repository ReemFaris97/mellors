<?php

namespace App\Http\Requests\Dashboard\Ride;

use Illuminate\Foundation\Http\FormRequest;

class RsrReportRequest extends FormRequest
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
            'ride_performance_details'=>'required',
            'ride_inspection'=>'required',
            'corrective_actions_taken'=>'required',
            'conclusion'=>'required',
            'date'=>'nullable',
            'type'=>'nullable',

            'created_by_id'=>'nullable',
            'verified_by_id'=>'nullable',


        ];
    }
}
