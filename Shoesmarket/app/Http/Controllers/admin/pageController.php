<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\news;
class pageController extends Controller
{
	public function __construct()
    {
    	//dd("5");
    	$this->middleware('auth:admin');
    }
    public function getDashboard()
    {
    	$list = news::orderBy('created_at','DESC')->get();
    	return view('admin.page.dashboard',['list'=>$list]);
    }

}
