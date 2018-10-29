<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name' => 'nullable|string|min:2|max:128',
            'description' => 'nullable|string',
            'services' => 'nullable|string',
            'image' => 'nullable|string|min:2|max:128',
            'hotel_id' => 'integer',
            'checkin' => 'nullable|date',
            'checkout' => 'nullable|date',
        ];
    }
}
