<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Hash;
use App\Http\Controllers\admin\AdminLoginController as AdminLoginController;
use Auth;
use App\employees;
class 	AdminChangePassWord extends Controller
{

    public function getchangePass()
    {
    	// if(!empty(Auth::guard('admin')->user()->name))
        	return view('admin.changePassword');
       	// else
       	// 	return redirect()->back();
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
        $username = $request->username;
        if($comfirmpass===$newpassword)
        {

            $employee = employees::where('email',$email)->where('password',Hash::make($oldpassword))->get();//->update(['password'=>Hash::make($newpassword)]);
            // dd($employee);
            (new AdminLoginController)->logout();
            return redirect()->route('admin.getchangepass')->with('thongbao','Thay đổi password thành công');
        }
        else
            return redirect()->route('admin.getchangepass')->with('thongbao','Thay đổi password thất bại !');
    }

}