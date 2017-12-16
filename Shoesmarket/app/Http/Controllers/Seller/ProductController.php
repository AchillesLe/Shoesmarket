<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Product;
//use App\News;
class ProductController extends Controller
{
    public function getListProduct()
    {
    	$seller=Auth::guard('seller')->user();
    	$listproduct=DB::table("products")->where('idseller',$seller->id)->get();
    	//$news= News::with('product')->get();
    	return view('seller.page.products.listproduct',['listproduct'=>$listproduct],compact('seller'));
    }
    public function changeStatus($id)
    {	
    	$product=Product::find($id);
    	if($product->status==0)
    	{
    		$product->status=1;
    	}
    	else
    	{
    		$product->status=0;
    	}
    	$product->save();
    	return redirect()->route('getListProduct');
    }
}