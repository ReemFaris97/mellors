<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubmitCycleRequest extends FormRequest
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
            'ride_id' => 'required|exists:rides,id',
            'park_id' => 'required|exists:parks,id',
            'zone_id' => 'required|exists:zones,id',
            'park_time_id' => 'required|exists:park_times,id',
            'number_of_vip' => 'nullable',
            'number_of_disabled' => 'nullable',
            'number_of_ft' => 'nullable',
            'riders_count' => 'required',
            'start_time' => 'required',

        ];
    }
}
