<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    }
    public function postRegister(){

    }
    public function logout()
    { 
        Auth::guard('seller')->logout();

        return redirect()->route('seller.login');
    }
}
