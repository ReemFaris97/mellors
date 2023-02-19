<?php

namespace App\Http\Requests\Dashboard\InspectionList;

use Illuminate\Foundation\Http\FormRequest;

class RideInspectionListRequest extends FormRequest
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

        $rules= [
            'ride_id' => 'required',
            'inspection_list_id'=>'required',

        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'ride_id'=>'nullable',
                'inspection_list_id'=>'nullable',

            ];
        }
        return $rules;

    }
}
