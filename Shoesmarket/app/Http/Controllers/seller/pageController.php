<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;

class pageController extends Controller
{
    public function getDashboard()
    {
    	$seller=Auth::guard('seller')->user();
        $rating=DB::table('ratings')->where('idseller',$seller->id)->first();
    	$listproduct=DB::table('products')->where('idseller',$seller->id)->get();
    	$countproduct=DB::table('products')->where('idseller',$seller->id)->count();
    	$countnews=0;
    	foreach ($listproduct as $product) {
    		$count=DB::table('news')->where('idproduct',$product->id)->count();
    		$countnews+=$count;
    	}
    	$countbill=DB::table('bill_sellers')->where('idseller',$seller->id)->count();
    	return view('seller.page.dashboard',compact('countproduct','countnews','countbill','seller','rating'));
    }
    public function getChangePassword()
    {
        return view('seller.page.changepassword');
    }
    public function postChangePassword(ChangePasswordRequest $request)
    {
        $seller=Auth::guard('seller')->user();
        if (Hash::check($request->pwCurrent, $seller->password)) {
            $seller->fill([
                'password' => Hash::make($request->pwNew)
            ])->save();
        }
        return redirect()->route('getChangePassword');
    }
    public function postChangeInfo(Request $request)
    {
        $seller=Auth::guard('seller')->user();
        $file_name=$request->file('imgSeller')->getClientOriginalName();
        $hinh="seller".$seller->id."-".$file_name;
        $seller->image='Seller/'.$hinh;
        $request->file('imgSeller')->move('source/Upload/Seller',$hinh);
        $seller->save();
        return redirect()->route('seller.dashboard');
    }
}
