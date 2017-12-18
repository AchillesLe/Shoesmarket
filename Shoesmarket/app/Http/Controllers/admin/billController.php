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
