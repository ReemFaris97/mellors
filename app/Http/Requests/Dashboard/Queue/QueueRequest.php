<?php

namespace App\Http\Requests\Dashboard\Queue;

use Illuminate\Foundation\Http\FormRequest;

class QueueRequest extends FormRequest
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
                'user_id'=>'required',
                'queue_minutes'=>'required',
                'date'=>'nullable',
                'start_time'=>'nullable',
                'current_queue_occupancy'=>'nullable',
                'current_wait_time'=>'nullable',
                'max_queue_capacity'=>'nullable',
                'riders_count'=>'nullable',
                'opened_date'=>'nullable',
            ];

        return $rules;

    }
}
