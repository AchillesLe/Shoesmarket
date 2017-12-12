<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bill;
use App\bill_seller;
use App\detail_bill;
class billController extends Controller
{
    public function index()
    {
        $list = bill::orderBy('created_at','DESC')->get();
        return view('admin.bill.index',['list'=>$list]);
    }
 	public function detail($id)
    {
        $listbillseller = bill_seller::where('idbill',$id)->get();
        $idbillseller = $listbillseller[0]->id;
        $listdetailbill = detail_bill::whereIn('idbill_seller',$listbillseller[0]->id)->get();
        return view('admin.bill.detail',['list'=>$list]);
    }
}
