<?php

namespace App\Http\Requests\Dashboard\ParkTime;

use Illuminate\Foundation\Http\FormRequest;

class EntranceCountRequest extends FormRequest
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
        if ($this->getMethod() == 'PATCH') {
            ddd();
            $rules = [
                'park_id'=>'nullable',
                'start'=>'nullable',
                'end'=>'nullable',
                'date'=>'nullable',
                'daily_entrance_count'=>'required'
            ];
        }
        return $rules;

    }
}
