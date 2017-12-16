<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class pageController extends Controller
{
    public function getDashboard()
    {
    	$seller=Auth::guard('seller')->user();
    	$listproduct=DB::table('products')->where('idseller',$seller->id)->get();
    	$countproduct=DB::table('products')->where('idseller',$seller->id)->count();
    	$countnews=0;
    	foreach ($listproduct as $product) {
    		$count=DB::table('news')->where('idproduct',$product->id)->count();
    		$countnews+=$count;
    	}
    	$countbill=DB::table('bill_sellers')->where('idseller',$seller->id)->count();
    	return view('seller.page.dashboard',compact('countproduct','countnews','countbill','seller'));
    }
}
