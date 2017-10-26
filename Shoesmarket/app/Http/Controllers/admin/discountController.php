<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\discount;

class discountController extends Controller
{
    public function getlist()
    {
    	$list =  discount::all();
    	return view('admin/guaranteeAndiscount/listdiscount',['list'=>$list]);
    }
    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|min:3|max:50'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên danh mục',
                'name.min'=>'Tên  loại giày phải dài hơn 3 -> 50 kí tự ' ,
                'name.max'=>'Tên  loại giày hơn 3 -> 50 kí tự ',
            ]);
        if($request->has('edit'))
        {
            discount::where('id',$request->id)->update(['name'=>$request->name,'value'=>floatval($request->value)*0.01]);  
            return redirect('admin/discount/list')->with('thongbao','Sửa thành công');      
        }
        else
        {
            $this->validate($request,
                [
                    'name'=>'unique:type,name'
                ],
                [
                    'name.unique'=>'Tên danh mục bảo hành đã có trong hệ thống .Vui lòng kiểm tra lại .',
                ]);
            $discount = new discount;
            $discount->name = $request->name;
            $discount->value = $request->value;
            $discount->save();
            return redirect('admin/discount/list')->with('thongbao','Thêm thành công');
        }
       
        
    }
    public function delete($id)
    {
    	$discount = discount::where('id',$id)->delete();
    	return redirect('admin/discount/list')->with('thongbao','Xoá thành công');
    }

}
