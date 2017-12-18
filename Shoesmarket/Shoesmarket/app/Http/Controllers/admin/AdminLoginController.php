<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function getlogin()
    {
        return view('admin.login');
    }
    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:32'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],null))
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back();
    }
    public function logout()
    {
         
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    
}
