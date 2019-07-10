<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
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
            'name'=>'unique:categories|required|min:2|max:50',
            'icon'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'properties.*'=>'max:50'
        ];
    }
    public function messages(){
        return[
            'icon.required'=>'upload any images please!'
        ];
        
    }
}
