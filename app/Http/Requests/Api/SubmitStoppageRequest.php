<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubmitStoppageRequest extends FormRequest
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
            'park_time_id'=>'nullable|exists:park_times,id',
            'stopage_sub_category_id'=>'required|exists:stopage_sub_categories,id',
//            'ride_notes'=>'nullable',
            'date_time'=>'nullable',
            'description'=>'nullable',
            'time_slot_start'=>'nullable',
            'type'=>'required',
            'date'=>'nullable',
            'stopage_category_id'=>'nullable|exists:stopage_categories,id'
        ];
    }
}
