<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddNewsRequest;
use App\Package;
use DB;
use App\Product;
use App\Productcolor;
use App\News;
use App\Seller;
use Auth;
use Input;
class NewsController extends Controller
{
    public function getBuyPackage()
    {
        $list_newspackage= DB::table('packages')->get();
    	return view('seller.page.news.buypackage',['list_newspackage' => $list_newspackage]);
    }
    public function getAddNews()
    {
        $user=Auth::guard('seller')->user();
        $list_typeProduct=DB::table('types')->get();
        $quantity_news=DB::table('sellers')->where('id',$user->id)->first();
    	return view('seller.page.news.add',['list_typeProduct' => $list_typeProduct],compact('quantity_news'));
    }
    public function postAddNews(AddNewsRequest $request){
        $seller=Auth::guard('seller')->user();
        $file_name=$request->file('imgProduct')->getClientOriginalName();
        $product = new Product;
        $product->name=$request->txtNameProduct;
        $product->sex=$request->optradioSexProduct;
        $product->price=$request->txtPriceProduct;
        $product->idtype=$request->cbLoaiSP;
        $product->idseller=$seller->id;
        $product->image=$file_name;
        if($request->optradioSexProduct==1){
            $request->file('imgProduct')->move('source/Upload/NAM/',$file_name);
        }
        else{
            $request->file('imgProduct')->move('source/Upload/NU/',$file_name);
        }
        $product->save();

        $product_id=$product->id;
        
        $color=Input::get('colorProduct');
        $quantity=Input::get('quantityProduct');
        $size=Input::get('sizeProduct');
        //if (Input::has('colorProduct') && Input::has('quantityProduct') && Input::has('sizeProduct'))
        //{
        $totalquantity=0;
        foreach($color as $key => $n)
        {
            $khohang = new Productcolor;
            $khohang->idproduct=$product_id;
            $khohang->color=$color[$key];
            $khohang->size=$size[$key];
            $khohang->quantity=$quantity[$key];
            $khohang->save();
            $totalquantity+=$quantity[$key];
        }

        $news = new News;
        $news->idproduct=$product_id;
        $news->name_meta=changeTitle($request->txtNameProduct).".".$seller->id.".".$product_id;
        $news->note=$request->txtNoiDung;
        $news->save();

        $productedit=Product::find($product_id);
        $productedit->quantity=$totalquantity;
        $productedit->save();

        $selleredit=Seller::find($seller->id);
        $selleredit->newsquantity-=1;
        $selleredit->save();
        //}
        return redirect()->route('getListProduct');

    }
    public function getEditNews($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $news=DB::table('news')->where('idproduct',$id)->first();
        return view('seller.page.news.edit',compact(['news','product']));
    }
    public function getListOrderNews(){
    	return view('seller.page.news.newsorder');
    }
}