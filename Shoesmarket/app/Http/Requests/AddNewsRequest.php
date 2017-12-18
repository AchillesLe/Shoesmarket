<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewsRequest extends FormRequest
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
            'txtNameProduct'=>'required',
            'cbLoaiSP'=>'required|not_in:0',
            'optradioSexProduct'=>'required',
            'txtPriceProduct'=>'required',
            'imgProduct'=>'required|image|dimensions:min_width=250,min_height=300',
            'txtNameNews'=>'required',
            'txtNoiDung'=>'required'
            /*'colorProduct.*'=>'required',
            'sizeProduct.*'=>'required',
            'quantityProduct.*'=>'required'*/
        ];
    }
    public function messages()
    {
        return [
            'txtNameProduct.required'=>'Vui lòng nhập tên sản phẩm',
            'cbLoaiSP.required'=>'Vui lòng chọn loại sản phẩm',
            'cbLoaiSP.not_in'=>'Vui lòng chọn loại sản phẩm',
            'optradioSexProduct.required'=>'Vui lòng chọn giới tính',
            'txtPriceProduct.required'=>'Vui lòng nhập giá sản phẩm',
            'imgProduct.image'=>'File chọn không phải file hình ảnh',
            'imgProduct.required'=>'Vui lòng upload ảnh',
            'imgProduct.dimensions'=>'upload ảnh có chiều rộng x chiều dài ít nhất là 250x300',
            'txtNameNews.required'=>'Nhập tiêu đề bản tin',
            'txtNoiDung.required'=>'Nhập nội dung bản tin'
            /*'colorProduct.*.required'=>'Vui lòng nhập màu sắc',
            'sizeProduct.*.required'=>'Vui lòng nhập kích thước',
            'quantityProduct.*.required'=>'Vui lòng nhập số lượng'*/
        ];
    }
}