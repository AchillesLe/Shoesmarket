<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\employees;
use Illuminate\Support\Facades\Hash;
class loginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getlogin()
    {
        return view('admin.login');
    }
    public function postlogin(loginRequest $request)
    {
    	$login  = array(
    		'username'=>$request->username,
    		'password'=>$request->password

    	);
    	if($this->auth()->attempt($login))
    	{
    		return redirect()->route('dashboard');
    	}
    	else{
    		return redirect()->back();
    	}
    }
    public function getchangePass()
    {
        return view('admin.employee.changePassword');
    }
    public function changePass(Request $request)
    {
         $this->validate($request,
            [
                'username'=>'required|min:3|max:50',
                'newpassword'=>'required|min:3|max:50',
                'oldpassword'=>'required|min:3|max:50',
                'comfirmpass'=>'required|min:3|max:50',
            ],
            [
                'username.required'=>'Username không được bỏ trống.',
                'username.min'=>'Username phải dài hơn 3  .' ,
                'username.max'=>'Username phải ít hơn 50 kí tự .',
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
        $comfirmpass = $request->comfirmpass;
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;
        $username = $request->username;
        if($comfirmpass===$newpassword)
        {
            $employee = employees::where('username',$username)->where('password',Hash::make($oldpassword))->update(['password'=>Hash::make($newpassword)]);

            return redirect()->route('admin.getchangepass')->with('thongbao','Thay đổi password thành công');
        }
        else
            return redirect()->route('admin.getchangepass')->with('thongbao','Thay đổi password thất bại !');
    }
}
