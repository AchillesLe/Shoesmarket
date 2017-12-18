<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ShipfeeRequest extends FormRequest
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
        $sellerId=Auth::guard('seller')->user()->id;
        return [
            'txtShipfee'=>'required',
            'cbCountyShipfee'=>'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'txtShipfee.required'=>'Vui lòng nhập phí giao hàng',
            'cbCountyShipfee.required'=>'Vui lòng chọn quận huyện',
            'cbCountyShipfee.not_in'=>'Vui lòng chọn quận huyện'
        ];
    }
}
