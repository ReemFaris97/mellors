<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubmitQueuesRequest extends FormRequest
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
            'park_time_id' => 'required|exists:park_times,id',
//            'queue_minutes' => 'required|integer',
            'current_wait_time' => 'nullable',
            'riders_count' => 'required',
//            'current_queue_occupancy' => 'required',
            'start_time' => 'required',
         ];
    }
}
