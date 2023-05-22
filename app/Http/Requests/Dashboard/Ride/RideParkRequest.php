<?php

namespace App\Http\Requests\Dashboard\Ride;

use Illuminate\Foundation\Http\FormRequest;

class RideParkRequest extends FormRequest
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
            'ride_id' => 'required'
        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'park_id' => 'required',
                'ride_id' => 'required',         
               ];
        }
        return $rules;

    }
}
