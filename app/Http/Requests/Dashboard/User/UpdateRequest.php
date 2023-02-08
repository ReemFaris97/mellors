<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'name'=>'required|string',
            'phone'=>'required|string',
            'first_name'=>'nullable',
            'middle_name'=>'nullable',
            'last_name'=>'nullable',
            'branch_id'=>'required',
            'department_id'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->route('user')->id,
//            'password'=>'required|confirmed',

        ];
    }
}
