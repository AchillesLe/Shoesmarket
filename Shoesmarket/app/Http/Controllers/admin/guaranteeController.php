<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\guarantee;

class guaranteeController extends Controller
{
    public function getlist()
    {
    	$list =  guarantee::all();
    	return view('admin/guaranteeAndiscount/listguarantee',['list'=>$list]);
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
            guarantee::where('id',$request->id)->update(['name'=>$request->name,'value'=>$request->value]);  
            return redirect('admin/guarantee/list')->with('thongbao','Sửa thành công');      
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
            $guarantee = new guarantee;
            $guarantee->name = $request->name;
            $guarantee->value = $request->value;
            $guarantee->save();
            return redirect('admin/guarantee/list')->with('thongbao','Thêm thành công');
        }
       
        
    }
    public function delete($id)
    {
    	$guarantee = guarantee::where('id',$id)->delete();
    	return redirect('admin/guarantee/list')->with('thongbao','Xoá thành công');
    }

}
