<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email'   =>'required|email',
            'phone'   =>'required|max:11',
            'subject' =>'required',
            'content' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ và tên của bạn',
            'fullname.string' => 'Vui lòng nhập ký tự',
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email'=> 'Vui lòng nhập đúng định dạng email vidu :example@gmail.com',
            'phone.required' => 'Vui lòng nhập số điện thoại của bạn',
            'phone.max' => 'Nhập không quá 11 số',
            'subject.required'=> 'Vui lòng nhập tiêu đề',
            'content.required'=> 'Vui lòng nhập nội dung'
        ];
    }
}
