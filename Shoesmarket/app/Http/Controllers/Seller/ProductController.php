<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller
{
    public function getListProduct()
    {
    	$listproduct=DB::table("product")->where('idseller',2)->get();
    	return view('seller.page.products.listproduct',['listproduct'=>$listproduct]);
    }
}