<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\employees;
use App\role;
use Illuminate\Support\facades\Hash;

class employeeController extends Controller
{
    public function index()
    {
    	$list = employees::all();
    	return view('admin/employee/list',['list'=>$list]);
    }
    public function editStatus($id)
    {
    	$employee = employees::where('id',$id)->get()->first();
    	if($employee->status=='1')
    		employees::where('id',$id)->update(['status'=>'0']);
    	if($employee->status=='0')
    		employees::where('id',$id)->update(['status'=>'1']);
    	return redirect(url('admin/employee/list'));
    }
	public function update(Request $request)
    {
        
        if($request->has('edit'))
        {
            $this->validate($request,
            [
                'name'=>'required|min:6|max:20',
                'email'=>'required|min:8|max:50',
                'phone'=>'required|min:10|max:11',
                'address'=>'required|min:10|max:70',

            ],
            [
                'name.required'=>'Tên không được bỏ trống.',
                'name.min'=>'Tên phải dài từ 8->50 kí tự  .' ,
                'name.max'=>'Tên phải dài từ 8->50 kí tự  .',
                'email.required'=>'Địa chỉ email không được bỏ trống.',
                'email.min'=>'Địa chỉ email phải dài từ 3->50 kí tự  .' ,
                'email.max'=>'Địa chỉ email phải dài từ 3->50 kí tự  .',
                'phone.required'=>'Số điện thoại không được bỏ trống.',
                'phone.min'=>'Số điện thoại phải dài từ 10->11 kí tự  .' ,
                'phone.max'=>'Số điện thoại phải dài từ 10->11 kí tự  .',
                'address.required'=>'Địa chỉ không được bỏ trống.',
                'address.min'=>'Địa chỉ  phải dài từ 10->70 kí tự  .' ,
                'address.max'=>'Địa chỉ  phải dài từ 10->70 kí tự  .',
            ]);
            employees::where('id',$request->id)->update(['phone'=>$request->phone,'address'=>$request->address]);
              
        }
        else if($request->has('add'))
        {
            $this->validate($request,
            [
                'name'=>'required|min:6|max:20',
                'pass'=>'min:8|max:50',
                'email'=>'required|min:8|max:50',
                'phone'=>'required|min:10|max:11',
                'address'=>'required|min:10|max:70',

            ],
            [
                'name.required'=>'Tên không được bỏ trống.',
                'name.min'=>'Tên phải dài từ 8->50 kí tự  .' ,
                'name.max'=>'Tên phải dài từ 8->50 kí tự  .',
                'pass.min'=>'Mật khẩu phải dài từ 3->50 kí tự  .' ,
                'pass.max'=>'Mật khẩu  phải dài từ 3->50 kí tự  .',
                'email.required'=>'Địa chỉ email không được bỏ trống.',
                'email.min'=>'Địa chỉ email phải dài từ 3->50 kí tự  .' ,
                'email.max'=>'Địa chỉ email phải dài từ 3->50 kí tự  .',
                'phone.required'=>'Số điện thoại không được bỏ trống.',
                'phone.min'=>'Số điện thoại phải dài từ 10->11 kí tự  .' ,
                'phone.max'=>'Số điện thoại phải dài từ 10->11 kí tự  .',
                'address.required'=>'Địa chỉ không được bỏ trống.',
                'address.min'=>'Địa chỉ  phải dài từ 10->70 kí tự  .' ,
                'address.max'=>'Địa chỉ  phải dài từ 10->70 kí tự  .',
            ]);
            $employee = new employees;
            if($request->has('pass'))
            	$employee->password = Hash::make($request->pass);
            if($request->has('name'))
            	$employee->name = $request->name;
            if($request->has('address'))
            	$employee->address = $request->address;
            if($request->has('email'))
            	$employee->email = $request->email;
            if($request->has('phone'))
            	$employee->phone = $request->phone;
            $employee->idrole = $request->role;
            $employee->save();
            return redirect('admin/employee/create')->with('thongbao','Thêm thành công');
        }
        return redirect()->back();   
	}
	public function create()
	{
		$listrole = role::all();
		return view('admin.employee.create',['listrole'=>$listrole]);
	}
   
}
