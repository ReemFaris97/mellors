<?php

namespace App\Http\Requests\Dashboard\Ride;

use Illuminate\Foundation\Http\FormRequest;

class RideStoppageStatusRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        if ($this->getMethod() == 'PATCH') {
            $rules = [
            'stoppage_status'=>'required',
            'description'=>'nullable',
            'parkTimeId'=>'required'
               
               ];
        }
        return $rules;
    }
}
