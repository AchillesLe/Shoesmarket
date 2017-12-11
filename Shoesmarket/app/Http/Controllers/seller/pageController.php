<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pageController extends Controller
{
    public function getDashboard()
    {
    	return view('seller.page.dashboard');
    }
    public function getListProductPage()
    {
    	return view('seller.page.listproduct');
    }
}
