<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class FeeshipController extends Controller
{
    public function getFeeshipConfig()
    {
    	return view('seller.page.feeship.feeship-config');
    }
}