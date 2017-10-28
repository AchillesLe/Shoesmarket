<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\package;

class packageController extends Controller
{
     public function getlist()
    {
    	$list =  package::all();
    	return view('admin/package/list',['list'=>$list]);
    }
    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|min:3|max:50'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên gói tin',
                'name.min'=>'Tên  gói tin phải dài hơn 3 -> 50 kí tự ' ,
                'name.max'=>'Tên  gói tin hơn 3 -> 50 kí tự ',
            ]);
        if($request->has('edit'))
        {
            package::where('id',$request->id)->update(['name'=>$request->name,'newquantity'=>$request->quantity,'money'=>$request->money]);  
            return redirect('admin/package/list')->with('thongbao','Sửa thành công');      
        }
        else
        {
            $this->validate($request,
                [
                    'name'=>'unique:package,name'
                ],
                [
                    'name.unique'=>'Tên gói tin đã có trong hệ thống .Vui lòng kiểm tra lại .',
                ]);
            $package = new package;
            $package->name = $request->name;
            $package->newquantity = $request->quantity;
            $package->money = $request->money;
            $package->save();
            return redirect('admin/package/list')->with('thongbao','Thêm thành công');
        }
       
        
    }
    public function delete($id)
    {
    	$package = package::where('id',$id)->delete();
    	return redirect('admin/package/list')->with('thongbao','Xoá thành công');
    }

}
