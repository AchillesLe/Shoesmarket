<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Seller;
use Auth;
use Hash;

class SellerLoginController extends Controller{
 
    // protected $redirectTo = '/sellercenter/dashboard';
    //Custom guard for member
    public function __construct()
    {
      $this->middleware('guest:seller')->except('logout');
    }

 //    public function username()
	// {
 //        return 'username';
	// }

    public function getLogin(){
    	return view('seller.auth.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:32'
        ]);
        if(Auth::guard('seller')->attempt(['email'=>$request->email,'password'=>$request->password],null))
        {
            return redirect()->route('seller.dashboard');
        }
    	else{
    		return redirect()->back();
    	}
    }
    public function getRegister(){
        return view('seller.auth.register');
    }
    public function postRegister(RegisterRequest $request){
        $seller = new Seller;
        $seller->name=$request->name;
        $seller->username=$request->username;
        $seller->email=$request->email;
        $seller->password=Hash::make($request->password);
        $seller->address=$request->address;
        $seller->phone=$request->phone;
        $seller->sex=$request->optradiosex;
        $seller->identification=$request->cmnd;
        $seller->remember_token=$request->_token;
        $seller->save();
        return redirect()->route('seller.login');
    }
    public function logout()
    { 
        Auth::guard('seller')->logout();

        return redirect()->route('seller.login');
    }
}
