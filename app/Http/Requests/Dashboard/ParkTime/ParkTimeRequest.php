<?php

namespace App\Http\Requests\Dashboard\ParkTime;

use Illuminate\Foundation\Http\FormRequest;

class ParkTimeRequest extends FormRequest
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
            'park_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'date' => 'required',
            'daily_entrance_count'=>'nullable',
            'close_date'=>'required'

        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'park_id'=>'nullable',
                'start'=>'nullable',
                'end'=>'nullable',
                'date'=>'nullable',
                'daily_entrance_count'=>'nullable',
                'close_date'=>'nullable'


            ];
        }
        return $rules;

    }
}
