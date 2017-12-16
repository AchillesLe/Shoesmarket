<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Bill_seller;
use App\Detail_bill;
use App\Bill;
use App\User;
class OrderController extends Controller
{
    public function getListOrder()
    {	$seller=Auth::guard('seller')->user();
    	$listbill=DB::table('bill_sellers')->where('idseller',$seller->id)->get();
    	return view('seller.page.orders.listorder',['listbill'=>$listbill],compact('seller'));
    }
    public function completeBill($id)
    {
    	$bill=Bill_seller::find($id);
    	if($bill->status==0)
    	{
    		$bill->status=1;
    	}
    	$bill->save();
    	return redirect()->route('getListOrder');
    }
    public function cancelBill($id)
    {
    	$bill=Bill_seller::find($id);
    	if($bill->status==0)
    	{
    		$bill->status=2;
    	}
    	$bill->save();
    	return redirect()->route('getListOrder');
    }
    public function getDetailBill($id)
    {
    	$listdetailbill=DB::table('detail_bills')->where('idbill_seller',$id)->get();
    	$billseller=Bill_seller::find($id);
    	$infobill=Bill::find($billseller->idbill);
    	$infoclient=User::find($infobill->iduser);
    	return view('seller.page.orders.detail',['listdetailbill'=>$listdetailbill],compact('infobill','infoclient'));
    }
    public function completeDetailBill($id)
    {
    	$detailbill=Detail_bill::find($id);
    	if($detailbill->status==0)
    	{
    		$detailbill->status=1;
    	}
    	$detailbill->save();
    	return redirect()->route('getDetailBill');
    }
    public function cancelDetailBill($id)
    {
    	$detailbill=Detail_bill::find($id);
    	if($detailbill->status==0)
    	{
    		$detailbill->status=2;
    	}
    	$detailbill->save();
    	return redirect()->route('getDetailBill');
    }
    public function getStatistics()
    {
    	return view('seller.page.orders.statistics');
    }
}