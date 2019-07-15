<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'fullname'=>'required|min:3|max:50',
            'email'=>'required|unique:users,email,'.$this->id.'|min:3|max:50',
            'phone'=>'required|min:9|max:20',
            'gender'=>'required|numeric',
            'address'=>'required|min:10',
            'role'=>'required|numeric'  
        ];
    }
}
