<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Seller;
use Hash;

class SellerAuthController extends Controller{

	use AuthenticatesUsers;
 
    protected $redirectTo = '/sellercenter/dashboard';
    //Custom guard for member
    public function __construct()
    {
      $this->middleware('guest:seller')->except('logout');
    }

    public function username()
	{
        return 'username';
	}

    public function getLogin(){
    	return view('seller.auth.login');
    }
    public function postLogin(Request $request){
    	$data=[
    		'username'=>$request->username,
    		'password'=>$request->password,
    	];
    	if(Auth::guard()->attempt($data))
    	{
    		return redirect()->route('dashboard');
    	}
    	else{
    		return redirect()->back();
    	}
    }
    public function getRegister(){

    }
    public function postRegister(){

    }
}
