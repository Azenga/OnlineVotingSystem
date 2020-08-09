<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['bail', 'required', 'string'],
            'phone_number' => ['bail', 'required', 'numeric'],
            'nickname' => [],
            'image' => ['image', 'mimes:png,jpeg,jpg,gif,bmp', 'max:2000']
        ];
    }
}
