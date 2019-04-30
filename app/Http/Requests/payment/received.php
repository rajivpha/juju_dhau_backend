<?php

namespace App\Http\Requests\payment;

use Illuminate\Foundation\Http\FormRequest;

class received extends FormRequest
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
            'received_date'=>'required',
            'received_amount'=>'required|max:100',
            'receipt_no'=>'required|max:100|unique:payment_receiveds',





        ];
    }
}
