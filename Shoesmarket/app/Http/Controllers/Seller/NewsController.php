<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use DB;
use App\Product;
use App\Productcolor;
use App\News;
class NewsController extends Controller
{
    public function getBuyPackage()
    {
        $list_newspackage= DB::table('packages')->get();
    	return view('seller.page.news.buypackage',['list_newspackage' => $list_newspackage]);
    }
    public function getAddNews()
    {
        $list_typeProduct=DB::table('types')->get();
        $quantity_news=DB::table('sellers')->where('id',2)->first();
    	return view('seller.page.news.add',['list_typeProduct' => $list_typeProduct],compact('quantity_news'));
    }
    public function postAddNews(Request $request){
        $product=new Product;
        $product->name=$request->txtTenSanPham;
        $product->idtype=$request->cbLoaiSP;
    }
    public function getEditNews()
    {
    	return view('seller.page.news.edit');
    }
    public function getListOrderNews(){
    	return view('seller.page.news.newsorder');
    }
}