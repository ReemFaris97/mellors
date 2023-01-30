<?php

namespace App\Http\Requests\Dashboard\Departments;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
                'name'=>'nullable',
            ];
        }
        return $rules;

    }
}
