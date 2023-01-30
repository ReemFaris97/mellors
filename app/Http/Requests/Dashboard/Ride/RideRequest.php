<?php

namespace App\Http\Requests\Dashboard\Ride;

use Illuminate\Foundation\Http\FormRequest;

class RideRequest extends FormRequest
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
            'game_id'=>'required|exists:games,id',
            'type'=>'required|in:1,0',
            'stopage_sub_category_id'=>'nullable|exists:stopage_sub_categories,id',
            'stoppage_reason'=>'nullable|string',
        ];
    }
}
