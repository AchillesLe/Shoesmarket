<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'pwCurrent'=>'required|min:6|max:32',
            'pwNew'=>'required|min:6|max:32',
            'pwNewConfirm'=>'required|min:6|max:32|same:pwNew'
        ];
    }
    public function messages()
    {
        return [
            'pwCurrent.required'=>'Vui lòng nhập mật khẩu',
            'pwCurrent.min'=>'Vui lòng nhập tối thiểu 6 ký tự',
            'pwCurrent.max'=>'Vui lòng chỉ nhập tối đa 32 ký tự',
            'pwNew.required'=>'Vui lòng nhập mật khẩu',
            'pwNew.min'=>'Vui lòng nhập tối thiểu 6 ký tự',
            'pwNew.max'=>'Vui lòng chỉ nhập tối đa 32 ký tự',
            'pwNewConfirm.required'=>'Vui lòng nhập mật khẩu',
            'pwNewConfirm.min'=>'Vui lòng nhập tối thiểu 6 ký tự',
            'pwNewConfirm.max'=>'Vui lòng chỉ nhập tối đa 32 ký tự',
            'pwNewConfirm.same'=>'Nhập giống password'
        ];
    }
}
