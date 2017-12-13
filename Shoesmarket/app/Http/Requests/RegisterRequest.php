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
            'name'=>'required',
            'optradiosex'=>'required',
            'cmnd'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'username'=>'required',
            'email'=>'required|unique:sellers,email',
            'password'=>'required|min:6|max:32|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập họ tên',
            'optradiosex.required'=>'Vui lòng chọn giới tính',
            'cmnd.required'=>'Vui lòng nhập cmnd',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'username.required'=>'Vui lòng nhập username',
            'email.required'=>'Vui lòng nhập email',
            'email.unique'=>'Email này đã đăng ký',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Vui lòng nhập tối thiểu 6 ký tự',
            'password.max'=>'Vui lòng chỉ nhập tối đa 32 ký tự'
        ];
    }
}
