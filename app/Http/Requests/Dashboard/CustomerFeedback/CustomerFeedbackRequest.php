<?php

namespace App\Http\Requests\Dashboard\CustomerFeedback;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFeedbackRequest extends FormRequest
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
            'comment' => 'required',
            'game_id' => 'required',
            'date' => 'required',
            'type' => 'required'
        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'comment'=>'nullable',
            ];
        }
        return $rules;

    }
}
