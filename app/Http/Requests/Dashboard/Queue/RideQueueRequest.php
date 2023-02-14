<?php

namespace App\Http\Requests\Dashboard\Queue;

use Illuminate\Foundation\Http\FormRequest;

class RideQueueRequest extends FormRequest
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
        return [
            'ride_id'=>'required',
            'park_id'=>'required',
            'user_id'=>'required',
            'seats_filled'=>'required',
            'queue_minutes'=>'required',
            'queue_seconds'=>'required',
            'date'=>'nullable',
            'time'=>'nullable',
            'opened_date'=>'nullable',
        ];
    }
}