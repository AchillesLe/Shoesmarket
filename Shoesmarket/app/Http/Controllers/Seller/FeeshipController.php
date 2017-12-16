<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class FeeshipController extends Controller
{
    public function getFeeshipConfig()
    {
    	$seller=Auth::guard('seller')->user();
    	$listcounty=DB::table('countys')->get();
    	//$listshipfee=DB::table('shipfeesellers')->where('idseller',$seller->id)->get();
    	return view('seller.page.feeship.feeship-config',['listcounty'=>$listcounty],compact('seller'));
    }
}