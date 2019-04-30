<?php

namespace App\Http\Requests\category;

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
            'image'=>'required|image',
            'category_name'=>'required|max:100',
            'status'=>'required|in:1,0',
            
        ];
    }
}
