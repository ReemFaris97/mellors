<?php

namespace App\Http\Requests\Dashboard\RideType;

use Illuminate\Foundation\Http\FormRequest;

class RideTypeRequest extends FormRequest
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
        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name'=>'required',
            ];
        }
        return $rules;

    }
}
