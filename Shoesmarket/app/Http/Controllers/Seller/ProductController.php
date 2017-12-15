<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
//use App\News;
class ProductController extends Controller
{
    public function getListProduct()
    {
    	$user=Auth::guard('seller')->user();
    	$listproduct=DB::table("products")->where('idseller',$user->id)->get();
    	//$news= News::with('product')->get();
    	return view('seller.page.products.listproduct',['listproduct'=>$listproduct]);
    }
}