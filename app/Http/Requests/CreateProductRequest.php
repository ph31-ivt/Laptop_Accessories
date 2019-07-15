<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'=>'required|unique:products|min:3|max:50',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric',
            'producer'=> 'required|min:3|max:50',
            'status'=> 'required|numeric',
            'category_id'=> 'required',
            'main_image'=>'required|mimes:png,jpg,jpeg,gif|max:2048',

        ];
    }
    // public function messages(){

    // }
}
