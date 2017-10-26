<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\type;

class typeController extends Controller
{
    public function getlist()
    {
    	$list = type::all();
    	return view('admin/type/listtype',['list'=>$list]);
    }
    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|min:3|max:50'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên thể loại',
                'name.min'=>'Tên thể loại giày phải dài hơn 3 -> 50 kí tự ' ,
                'name.max'=>'Tên thể loại giày hơn 3 -> 50 kí tự ',
            ]);
        if($request->has('edit'))
        {
            type::where('name',$request->id)->update(['name'=>$request->name,'description'=>$request->des]);  

            return redirect('admin/type/list')->with('thongbao','Sửa thành công');      
        }
        else
        {
            $this->validate($request,
                [
                    'name'=>'unique:type,Name'
                ],
                [
                    'name.unique'=>'Tên thể loại giày đã có trong hệ thống .Vui lòng kiểm tra lại .',
                ]);
            $newtype = new type;
            $newtype->name = $request->name;
            $newtype->namemeta = changeTitle($request->name);
            $newtype->description = $request->des;
            $newtype->save();
            return redirect('admin/type/list')->with('thongbao','Thêm thành công');
        }
       
        
    }
    public function delete($id)
    {
    	$type = type::where('id',$id)->delete();
        return redirect('admin/type/list')->with('thongbao','Xoá thành công');
    }

}
