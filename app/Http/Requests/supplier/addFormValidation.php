<?php

namespace App\Http\Requests\supplier;

use Illuminate\Foundation\Http\FormRequest;

class addFormValidation extends FormRequest
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
            'contact_no'=>'required|min:7|unique:suppliers',
            'goods_supplied'=>'required|max:50',
            'company_name'=>'required|max:100',
            'email'=>'required|max:100|unique:suppliers',
        ];
    }
}
