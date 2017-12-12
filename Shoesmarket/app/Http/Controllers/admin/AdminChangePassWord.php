<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Hash;
use App\Http\Controllers\admin\AdminLoginController as AdminLoginController;
use Auth;
use App\Employee;
class 	AdminChangePassWord extends Controller
{

    public function getchangePass()
    {
        	return view('admin.changePassword');
    }
    public function changePass(Request $request)
    {
         $this->validate($request,
            [
                'email'=>'required|min:8|max:50',
                'newpassword'=>'required|min:3|max:50',
                'oldpassword'=>'required|min:3|max:50',
                'comfirmpass'=>'required|min:3|max:50',
            ],
            [
                'email.required'=>'Địa chỉ email không được bỏ trống.',
                'email.min'=>'Địa chỉ email phải dài từ 3->50 kí tự  .' ,
                'email.max'=>'Địa chỉ email phải dài từ 3->50 kí tự  .',
                'newpassword.required'=>'password mới không được bỏ trống.',
                'newpassword.min'=>'password mới phải dài hơn 3  .' ,
                'newpassword.max'=>'password mới phải ít hơn 50 kí tự .',
                'oldpassword.required'=>'password cũ không được bỏ trống.',
                'oldpassword.min'=>'password cũ phải dài hơn 3  .' ,
                'oldpassword.max'=>'password cũ phải ít hơn 50 kí tự .',
                'comfirmpass.required'=>'xác nhận password cũ không được bỏ trống.',
                'comfirmpass.min'=>'xác nhận cũ password phải dài hơn 3  .' ,
                'comfirmpass.max'=>'xác nhận cũ  password phải ít hơn 50 kí tự .',
            ]);
        $email = $request->email;
        $oldpassword = $request->oldpassword;
        $comfirmpass = $request->comfirmpass;
        $newpassword = $request->newpassword;

        if($comfirmpass==$newpassword)
        {
            $employee = Employee::where('email',$email)->first();
            if(Hash::check($oldpassword, $employee->password))
            {
                $employee->update( ['password'=>Hash::make($newpassword)] );
                    (new AdminLoginController)->logout();
                    return redirect()->back()->with('thongbao','Thay đổi password thành công');
            }
            return redirect()->back()->with('thongbao','Thay đổi password thất bại !');
        }
        else
            return redirect()->back()->with('thongbao','Thay đổi password thất bại !');
    }

}