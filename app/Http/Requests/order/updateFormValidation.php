<?php

namespace App\Http\Requests\order;

use Illuminate\Foundation\Http\FormRequest;

class updateFormValidation extends FormRequest
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
            'quantity_size'=>'required|max:100',
            'order_date'=>'required|max:100',

        ];
    }
}
