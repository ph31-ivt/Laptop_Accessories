<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'unique:products,name,'.$this->id.'|required|min:3|max:50',
            'price'=>'required',
            'quantity'=>'required',
            'producer'=>'required',
            'status'=>'required',
            'category_id'=>'required',
            'main_image'=>'mimes:jpg,png,jpeg,gif|max:2048'

        ];
    }
}
