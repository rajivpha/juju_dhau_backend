<?php

namespace App\Http\Requests\staff;

use Illuminate\Foundation\Http\FormRequest;

class insertFormValidation extends FormRequest
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

'first_name'=>'required|min:2',
'last_name'=>'required|min:3',
'address'=>'required|max:255',
'contact'=>'required|min:7',
'email'=>'required|max:50|unique:staff',
'password'=>'required|min:6',
'position'=>'required'

        ];
    }
}
