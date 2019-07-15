<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:15',
            're_password'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập họ tên đầy đủ của bạn',
            'fullname.string'=>'Vui lòng nhập ký tự',
            'email.required'=>'Vui lòng nhập email của bạn',
            'email.email'=>'Vui lòng nhập đúng định dạng email',
            'email.unique'=>'Email này đã tồn tại',
            'password.required'=>'Vui lòng nhập password của bạn',
            'password.min'=>'Vui lòng nhập ít nhất 8 ký tự',
            'password.max'=>'Vui lòng nhập không quá 15 ký tự',
            're_password.required'=>'Vui lòng nhập lại password của bạn',
            're_password.same'=>'Password không trùng nhau'
        ];
    }
}
