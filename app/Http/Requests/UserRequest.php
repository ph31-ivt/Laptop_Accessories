<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'fullname'=>'required|string',
            'email'   =>'required|email|unique:users,email,'.(\Auth::check()?\Auth::user()->id:''),
            'address' =>'required',
            'phone'   =>'required|max:11'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ và tên của bạn',
            'fullname.string' => 'Vui lòng nhập ký tự',
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email'=> 'Vui lòng nhập đúng định dạng email vidu :example@gmail.com',
            'email.unique'=> 'Email đã tồn tại',
            'address.required' => 'Vui lòng nhập địa chỉ của bạn',
            'phone.required' => 'Vui lòng nhập số điện thoại của bạn',
            'phone.max' => 'Nhập không quá 11 số',
            // 'phone.min' => 'Nhập ít nhất 10 số',
            //'phone.numeric'=>'Không được nhập ký tự'
        ];
    }
}
