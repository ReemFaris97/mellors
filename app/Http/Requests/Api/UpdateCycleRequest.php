<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCycleRequest extends FormRequest
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
            'number_of_vip' => 'nullable',
            'number_of_disabled' => 'nullable',
            'number_of_ft' => 'nullable',
            'riders_count' => 'nullable',
//            'duration_seconds' => 'nullable',
            'id' => 'required|exists:ride_cycles,id',
        ];
    }
}
