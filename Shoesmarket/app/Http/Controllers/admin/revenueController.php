<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class revenueController extends Controller
{
    public function revenue()
    {

    	return view('admin/revenue/revenue');
    }
    

}
