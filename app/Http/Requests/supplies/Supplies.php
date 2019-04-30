<?php

namespace App\Http\Requests\supplies;

use Illuminate\Foundation\Http\FormRequest;

class supplies extends FormRequest
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
            'product_name'=>'required|max:100',
            'quantity'=>'required',
            'price'=>'required',
            'delivered_date'=>'required',
            'invoice_no'=>'required|max:100',




        ];
    }
}
