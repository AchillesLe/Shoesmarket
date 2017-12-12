<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bill;
use App\Bill_seller;
use App\Detail_bill;
class billController extends Controller
{
    public function index()
    {
        $list = Bill::orderBy('created_at','DESC')->get();
        return view('admin.bill.index',['list'=>$list]);
    }
 	public function detail($id)
    {
        $listbillseller = Bill_seller::where('idbill',$id)->get();
        $idbillseller = $listbillseller[0]->id;
        $listdetailbill = Detail_bill::whereIn('idbill_seller',$listbillseller[0]->id)->get();
        return view('admin.bill.detail',['list'=>$list]);
    }
}
