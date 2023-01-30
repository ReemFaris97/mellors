<?php

namespace App\Http\Requests\Dashboard\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        if ($this->getMethod() == 'PATCH') {
            $rules = [
                'description'=>'nullable',
                'image'=>'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
            ];
        }
        return $rules;
    }
}
