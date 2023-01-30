<?php

namespace App\Http\Requests\Dashboard\Game;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'nullable',
            'park_id' => 'required',
            'capacity' => 'required|int',
            'cycle_duration_per_second' => 'nullable',
            'cycle_duration_load_unload_minutes' => 'nullable',
            'is_flow' => 'required',
            'price' => 'required',
            'price_vip' => 'nullable',
            'game_cat_id' => 'required',
            'zone_id' => 'required'
        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name'=>'nullable',
                'description' => 'nullable',
                'park_id' => 'nullable',
                'capacity' => 'nullable',
                'cycle_duration_per_second' => 'nullable',
                'cycle_duration_load_unload_minutes' => 'nullable',
                'is_flow' => 'nullable',
                'price' => 'nullable',
                'price_vip' => 'nullable',
                'game_cat_id' => 'nullable',
                'zone_id' => 'nullable'
            ];
        }
        return $rules;

    }
}
