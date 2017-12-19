<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\News as news;
use App\Product;
use App\Productcolor;
use App\Type;
use App\Bill;
use App\Bill_seller;
use App\Detail_bill;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
	public function index()
	{
        $iduser = Auth::user()->id;
        $list = DB::table('detail_bills')
            ->join('bill_sellers', 'detail_bills.idbill_seller', '=', 'bill_sellers.id')
            ->join('bills', 'bill_sellers.idbill', '=', 'bills.id')
            ->join('productcolors', 'detail_bills.idproductcolor', '=', 'productcolors.id')
            ->join('products', 'productcolors.idproduct', '=', 'products.id')
            ->join('sellers', 'products.idseller', '=', 'sellers.id')
            ->where('bills.iduser',$iduser)
            ->select('detail_bills.id','detail_bills.quantity','detail_bills.total','detail_bills.status','detail_bills.israting','productcolors.color','productcolors.size','products.name','products.price','products.sex','products.image','bills.created_at','sellers.name')
            ->orderby('bills.created_at','DESC')
            ->get();
            
        return view('user.page.listdetailproduct',['list'=>$list]);
	}
        public function upatestatus(Request $Request)
        {
            
                $id = Request::get('id');
            if($id)
            {
                $detail_bill = Detail_bill::find($id);
                if($detail_bill)
                {
                    $detail_bill->status = '3';
                    $detail_bill->save();
                    return "true";
                }
               
            }
                return "false";  
        }
        public function upatesrating(Request $Request)
        {
            
            $id = Request::get('id');
            if($id)
            {
                $detail_bill = Detail_bill::find($id);
                if($detail_bill)
                {
                    $detail_bill->status = '3';
                    $detail_bill->save();
                    return "true";
                }
               
            }
                return "false";  
        }
}