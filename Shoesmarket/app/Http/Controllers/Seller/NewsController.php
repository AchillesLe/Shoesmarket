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
use DateTime;
class NewsController extends Controller
{
    public function getListNews()
    {
        $seller=Auth::guard('seller')->user();
        $listproduct=DB::table('products')->where('idseller',$seller->id)->get();
        //$news= News::with('product')->get();
        return view('seller.page.news.listnews',['listproduct'=>$listproduct],compact('seller'));
    }
    public function getListOrderNews(){
        $seller=Auth::guard('seller')->user();
        $listordernews=DB::table('receipts')->where('idseller',$seller->id)->get();
        return view('seller.page.news.newsorder',['listordernews'=> $listordernews]);
    }
    public function getBuyPackage()
    {
        $list_newspackage= DB::table('packages')->get();
    	return view('seller.page.news.buypackage',['list_newspackage' => $list_newspackage]);
    }
    public function getAddNews()
    {
        $seller=Auth::guard('seller')->user();
        $list_typeProduct=DB::table('types')->get();
        $quantity_news=DB::table('sellers')->where('id',$seller->id)->first();
    	return view('seller.page.news.add',['list_typeProduct' => $list_typeProduct],compact('quantity_news','seller'));
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
        $now = new DateTime();
        $datestring=$now->format('dmYHis');
        $hinh=$datestring."-".$file_name;
        $product->image=$hinh;
        if($request->optradioSexProduct==1){
            $request->file('imgProduct')->move('source/Upload/NAM',$hinh);
        }
        else if($request->optradioSexProduct==2){
            $request->file('imgProduct')->move('source/Upload/NU',$hinh);
        }
        else{
            $request->file('imgProduct')->move('source/Upload',$hinh);
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
        $news->name=$request->txtNameNews;
        $news->name_meta=changeTitle($request->txtNameNews)."-".$seller->id.$product_id;
        $news->note=$request->txtNoiDung;
        $news->save();

        $productedit=Product::find($product_id);
        $productedit->quantity=$totalquantity;
        $productedit->save();

        $selleredit=Seller::find($seller->id);
        $selleredit->newsquantity-=1;
        $selleredit->save();
        //}
        return redirect()->route('getListNews');

    }
    public function getEditNews($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $news=DB::table('news')->where('idproduct',$id)->first();
        return view('seller.page.news.edit',compact('news','product'));
    }
    public function postEditNews(Request $request, $id)
    {
        $product=Product::find($id);
        $product->price=$request->txtNewPrice;
        $product->save();

        $news=News::where('idproduct',$id)->first();
        $news->name=$request->txtTitleNews;
        $news->note=$request->txtNoiDungTin;
        $news->save();

        return redirect()->route('getListNews');
    }
    public function changeStatusNews($id)
    {   
        $news=News::find($id);
        if($news->status==0)
        {
            $news->status=1;
        }
        else
        {
            $news->status=0;
        }
        $news->save();
        return redirect()->route('getListNews');
    }
}