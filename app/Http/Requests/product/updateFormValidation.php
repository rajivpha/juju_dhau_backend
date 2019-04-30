<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class updateFormValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_name'=>'required|max:100',
            'quantity'=>'required',
            'price'=>'required',
            'manudate'=>'required',
            'status'=>'required|in:1,0',
               ];
    }
}
