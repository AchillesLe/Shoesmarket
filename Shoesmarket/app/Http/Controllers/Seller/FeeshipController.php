<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Requests\ShipfeeRequest;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Shipfeeseller;
use Input;
class FeeshipController extends Controller
{
    public function getFeeshipConfig()
    {
    	$seller=Auth::guard('seller')->user();
    	$listcounty=DB::table('countys')->get();
    	$listshipfee=DB::table('shipfeesellers')->where('idseller',$seller->id)->get();
    	return view('seller.page.feeship.feeship-config',['listcounty'=>$listcounty,'listshipfee'=>$listshipfee],compact('seller'));
    }
    public function postSettingShipfee(ShipfeeRequest $request)
    {
    	$seller=Auth::guard('seller')->user();
    	$chkshipfee=Shipfeeseller::where('idseller',$seller->id)->where('idCounty',$request->cbCountyShipfee)->first();
    	if(empty($chkshipfee))
    	{
    		$shipfeeseller=new Shipfeeseller;
	    	$shipfeeseller->idseller=$seller->id;
	    	$shipfeeseller->idCounty=$request->cbCountyShipfee;
	    	$shipfeeseller->shipfee=$request->txtShipfee;
	    	$shipfeeseller->save();
    	}
    	else
    	{
    		$chkshipfee->shipfee=$request->txtShipfee;
    		$chkshipfee->save();
    	}
    	
    	return redirect()->route('getFeeshipConfig');
    }
    public function deleteShipfee($id)
    {
    	$shipfee=Shipfeeseller::findOrFail($id);
    	$shipfee->delete();
    	return redirect()->route('getFeeshipConfig');
    }
}