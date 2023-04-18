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
            'park_id' => 'nullable',
            'capacity_one_cycle' => 'required',
            'one_cycle_duration_seconds' => 'required',
            'ride_cycle_mins' => 'nullable',
            'ride_price' => 'nullable',
            'ride_price_ft' => 'nullable',
            'ride_cat' => 'required',
            'ride_type_id' => 'required',
            'zone_id' => 'nullable',
            'theoretical_number'=>'nullable',
            'minimum_height_requirement'=>'nullable',
            'number_of_seats'=>'nullable'
        ];
        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'name' => 'nullable',
                'description' => 'nullable',
                'park_id' => 'nullable',
                'capacity_one_cycle' => 'nullable',
                'one_cycle_duration_seconds' => 'nullable',
                'ride_cycle_mins' => 'nullable',
                'ride_price' => 'nullable',
                'ride_price_ft' => 'nullable',
                'ride_cat' => 'nullable',
                'ride_type_id' => 'nullable',
                'zone_id' => 'nullable',
                'theoretical_number'=>'nullable',
                'minimum_height_requirement'=>'nullable',
                'number_of_seats'=>'nullable'

            ];
        }
        return $rules;

    }
}
