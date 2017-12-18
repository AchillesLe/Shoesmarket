<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\News as news;
use App\Product;
use App\Productcolor;
use App\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
	public function index()
	{
		$Bill = Bill::find($id);
        $listbillseller = Bill_seller::where('idbill',$id)->get();
        $idBill_seller = array( );
        foreach ($listbillseller as $key => $value) {
            $idBill_seller[]=$value->id;
        }
        $listdetailbill = Detail_bill::whereIn('idbill_seller',$idBill_seller)->get();
        return view('admin.bill.detail',['Bill'=>$Bill,'listbillseller'=>$listbillseller,'listdetailbill'=>$listdetailbill]);
	}
}