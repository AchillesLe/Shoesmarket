<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\AdminMailShipped;
use App\Http\Controllers\User\OrdersController;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function getlogin()
    {
       
        return view('user.login.login');
    }
    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:32'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],null))
        {
           
            return redirect()->route('home');
        }
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        (new OrdersController)->deleteorder();
        return redirect()->route('home');
    }
    public function register()
    {
        return view('user.login.register');
    }
    public function postregister(Request $request)
    {
         $this->validate($request,
            [
                'email'=>'required|min:10|unique:user,email',
                'name'=>'required|min:4|max:24|unique:user,name',
                'phone'=>'required|min:10|max:11|unique:user,phone',
                'password'=>'required|min:3|max:50',
                'password_2'=>'required|min:3|max:50',
            ],
            [
                'email.required'=>'Địa chỉ email không được bỏ trống.',
                'email.min'=>'Địa chỉ email phải lớn hơn 8  khí tự  .' ,
                'email.unique'=>'Địa chỉ email đã được sử dụng  .',
                'name.required'=>'Full name không được bỏ trống.',
                'name.min'=>'Full name  phải dài hơn 4 khí tự  .' ,
                'name.max'=>'Full name phải ít hơn 24 kí tự .',
                'name.unique'=>'Tên này đã được sử dụng  .',
                'phone.required'=>'Số điện thoại không được bỏ trống.',
                'phone.min'=>'Số điện thoại phải từ 10 - > 11 chữ số  .' ,
                'phone.max'=>'Số điện thoại phải từ 10 - > 11 chữ số  .',
                'phone.unique'=>'Số điện thoại đã được sử dụng  .',
                'password.required'=>'password  không được bỏ trống.',
                'password.min'=>'password  phải từ 8- > 20 chữ số .' ,
                'password.max'=>'password  phải từ 8 - > 20 chữ số  .',
                'password_2.required'=>'password  không được bỏ trống.',
                'password_2.min'=>'password  phải từ 8- > 20 chữ số .' ,
                'password_2.max'=>'password  phải từ 8 - > 20 chữ số  .',
            ]);
        $email = $request->email;
        $name = $request->name;
        $phone = $request->phone;
        $password = $request->password;
        $password_2 = $request->password_2;
        if($password===$password)
        {
            $account = new User();
            $account->name = $name;
            $account->phone = $phone;
            $account->email= $email;
            $account->password = Hash::make($password);
            $account->save();
            Auth::login($account);
            return redirect()->route('home');
        }
        else
            return redirect()->route('register');
    }
}
