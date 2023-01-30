<?php

namespace App\Http\Requests\Dashboard\InspectionList;

use Illuminate\Foundation\Http\FormRequest;

class PreopeningListRequest extends FormRequest
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
            'game_id' => 'required',
            'zone_id' => 'required',
            'user_id' => 'nullable',
            'inspection_list' => 'required'
        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'game_id'=>'nullable',
                'zone_id'=>'nullable',
                'user_id'=>'nullable',
                'inspection_list'=>'nullable'
            ];
        }
        return $rules;

    }
}
