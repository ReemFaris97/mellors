<?php

namespace App\Http\Requests\Dashboard\park;

use Illuminate\Foundation\Http\FormRequest;

class ParkRequest extends FormRequest
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
            'branch_id' => 'required'

        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name'=>'nullable',
                'branch_id' => 'nullable'

            ];
        }
        return $rules;

    }
}
