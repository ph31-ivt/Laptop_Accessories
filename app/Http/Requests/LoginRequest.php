<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|string|exists:users,email',
            'password'=>'required|min:8|max:15'
        ];
    }

    public function message()
    {
        'email.required'=>'Vui lòng nhập email của bạn',
        'email.email'=>'Vui lòng nhập đúng định dạng email',
        'email.exists'=>'Email không tồn tại',
        'password.required'=>'Vui lòng nhập password của bạn',
        'password.min'=>'Vui lòng nhập ít nhất 8 ký tự',
        'password.max'=>'Vui lòng nhập không quá 15 ký tự'
    }
}
