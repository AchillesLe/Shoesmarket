<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pageController extends Controller
{
    public function getDashboard()
    {
    	return view('admin.page.dashboard');
    }
}
