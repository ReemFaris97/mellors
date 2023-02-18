<?php

namespace App\Http\Requests\Dashboard\InspectionList;

use Illuminate\Foundation\Http\FormRequest;

class InspectionListRequest extends FormRequest
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
            'name' => 'required',
            'comment'=>'required',

        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name'=>'nullable',
                'comment'=>'nullable',

            ];
        }
        return $rules;

    }
}
