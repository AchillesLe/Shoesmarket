<?php

namespace App\Http\Controllers\seller;

//use Illuminate\Http\Request;
use Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Bill_seller;
use App\Detail_bill;
use App\Bill;
use App\User;
use Carbon\Carbon;
use Validator;

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
    public function getStatistics(Request $request)
    {
        	return view('seller.page.orders.statistics'); 
    }
    public function statisticsBill(Request $request)
    {
        $datefrom = date("Y-m-d H:i:s",strtotime(Request::get('txtFromDate')));
        $dateto = date("Y-m-d H:i:s",strtotime(Request::get('txtToDate')));
        $listbill = DB::table('bills')->whereBetween('created_at',[$datefrom,$dateto])->get();
            //$listbill=Bill::whereDate('created_at','>=',$tu_ngay)->whereDate('created_at','<=',$den_ngay)->get();
            //$fromdate=\Carbon\Carbon::parse($request->txtFromDate)->timestamp;
            //$todate=\Carbon\Carbon::parse($request->txtToDate)->timestamp;
            //$listbill=Bill::whereBetween('created_at', [$fromdate, $todate])->get();
        return view('seller.page.orders.statistics',['listbill',$listbill]);
    }

}