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
        $this->validate($request,
            [
                'username'=>'required|min:3|max:50'
            ],
            [
                'username.required'=>'Username không được bỏ trống.',
                'username.min'=>'Username phải dài hơn 3  .' ,
                'username.max'=>'Username phải ít hơn 50 kí tự .',
            ]);
        if($request->has('edit'))
        {
            employees::where('id',$request->id)->update(['username'=>$request->name,'description'=>$request->des,'idtype'=>$request->type]);

            return redirect('admin/employee/create')->with('thongbao','Sửa thành công');      
        }
        else
        {
            $employee = new employees;
            if($request->has('username'))
            	$employee->username = $request->username;
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
	}
	public function create()
	{
		$listrole = role::all();
		return view('admin.employee.create',['listrole'=>$listrole]);
	}
   
}
