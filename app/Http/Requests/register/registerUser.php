<?php

namespace App\Http\Requests\register;

use Illuminate\Foundation\Http\FormRequest;

class registerUser extends FormRequest
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
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'name' => 'required|string|max:255',
            'contact_no'=>'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image'=>'max:255|image',

        ];
    }
}
