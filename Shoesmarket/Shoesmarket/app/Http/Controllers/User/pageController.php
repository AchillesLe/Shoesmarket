<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pageController extends Controller
{
    public function getIndex()
    {
    	return view('user.page.home');
    }
    public function getProductType()
    {
    	return view('user.page.product_type');
    }
    public function getDetailProduct()
    {
    	return view('user.page.product');
    }
}
