<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\seller;


class sellerController extends Controller
{
    public function getlist()
    {
        $list = seller::all();
    	return view('admin/seller/list',['list'=>$list]);
    }
    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|min:3|max:50'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên thể loại',
                'name.min'=>'Tên  loại giày phải dài hơn 3 -> 50 kí tự ' ,
                'name.max'=>'Tên  loại giày hơn 3 -> 50 kí tự ',
            ]);
        if($request->has('edit'))
        {
            producttype::where('id',$request->id)->update(['name'=>$request->name,'description'=>$request->des,'idtype'=>$request->type]);  

            return redirect('admin/producttype/list')->with('thongbao','Sửa thành công');      
        }
        else
        {
            $this->validate($request,
                [
                    'name'=>'unique:type,Name'
                ],
                [
                    'name.unique'=>'Tên loại giày đã có trong hệ thống .Vui lòng kiểm tra lại .',
                ]);
            $newtype = new producttype;
            $newtype->name = $request->name;
            $newtype->namemeta = changeTitle($request->name);
            $newtype->description = $request->des;
            $newtype->idtype = $request->type;
            $newtype->save();
            return redirect('admin/producttype/list')->with('thongbao','Thêm thành công');
        }
       
        
    }
    public function delete($id)
    {
    	$seller = seller::where('idseller',$id)->delete();
    	return redirect('admin/producttype/list')->with('thongbao','Xoá thành công');
    }
    public function updatestatus($id)
    {
        $seller = seller::where('idseller',$id);
        die($seller->name);
        if(!empty($seller))
        {
            if($seller->isblock =='0')
            {
                $seller->update(['isblock'=>'1']);
                return 1;
            }
            else 
            {
                $seller->update(['isblock'=>'0']);
                return 0;
            }
            
        }
        return false; 
    }

}
