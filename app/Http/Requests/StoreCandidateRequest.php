<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'email' => ['bail', 'required', 'email', 'unique:users'],
            'phone_number' => ['bail', 'required', 'numeric'],
            'national_id_number' => ['bail', 'required', 'numeric'],
            'ward_id' => ['bail', 'required', 'numeric'],
            'position_id' => ['bail', 'required', 'numeric'],
            'location_id' => ['bail', 'required', 'numeric'],
        ];
    }
}
