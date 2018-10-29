<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:128',
            'country' => 'required|string|min:2|max:128',
            'city' => 'required|string|min:2|max:32',
            'postcode' => 'required|string|min:2|max:16',
            'address' => 'required|string|min:2|max:128',
            'description' => 'required|string',
            'rating' =>'nullable|numeric|between:0,10',
            'image' => 'required|string|min:2|max:128',
        ];
    }
}


