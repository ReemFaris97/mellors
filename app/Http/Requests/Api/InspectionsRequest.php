<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class InspectionsRequest extends FormRequest
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
            'inspection_list_id' => 'required|array|exists:inspection_lists,id',
            'status' => 'nullable|array',
            'is_checked' => 'nullable|array',
            'comment' => 'nullable|array',
            'opened_date' => 'required|date',
            'park_time_id' => 'nullable|exists:park_times,id',
            'zone_id' => 'required|exists:zones,id',
            'park_id' => 'required|exists:parks,id',
            'lists_type' => 'required',
        ];
    }
}
