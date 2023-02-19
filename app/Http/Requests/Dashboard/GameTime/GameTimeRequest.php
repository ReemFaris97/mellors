<?php

namespace App\Http\Requests\Dashboard\GameTime;

use Illuminate\Foundation\Http\FormRequest;

class GameTimeRequest extends FormRequest
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
            $rules = [
                'ride_id'=>'required',
                'park_id'=>'required',
                'start'=>'nullable',
                'end'=>'nullable',
                'date'=>'nullable',
                'close_date'=>'nullable'

            ];

        return $rules;

    }
}
