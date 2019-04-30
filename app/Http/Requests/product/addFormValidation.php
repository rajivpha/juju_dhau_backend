<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class addFormValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image'=>'required|image',
            'product_name'=>'required|max:100',
            'quantity'=>'required',
            'price'=>'required',
           'manudate'=>'required',
            'status'=>'required|in:1,0',
        ];
    }
}
