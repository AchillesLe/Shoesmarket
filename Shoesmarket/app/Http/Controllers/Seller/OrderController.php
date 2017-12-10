<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function getListOrder()
    {
    	return view('seller.page.orders.listorder');
    }
}