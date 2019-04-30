<?php

namespace App\Http\Requests\banner;

use Illuminate\Foundation\Http\FormRequest;

class addformValidation extends FormRequest
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
            'image'=>'required|image',
            'alt_text'=>'required|max:255',
            'caption'=>'required|max:50',
            'rank'=>'required|min:1',
            'status'=>'required|in:1,0',




        ];
    }
}
