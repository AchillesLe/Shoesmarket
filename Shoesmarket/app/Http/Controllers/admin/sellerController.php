<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Seller;
use App\Package;
use App\Receipt;
use Auth;


class sellerController extends Controller
{
    public function getlist()
    {
        $list = Seller::orderBy('isblock','DESC')->get();//all()->sortBy('isblock');
    	return view('admin/seller/list',['list'=>$list]);
    }

    public function updatestatus($id)
    {
        $seller = Seller::where('id',$id)->first();
        if(!empty($seller))
        {
            if($seller->isblock =='0')
            {
                Seller::where('id',$id)->update(['isblock'=>'1']);
            }
            else 
            {
                Seller::where('id',$id)->update(['isblock'=>'0']);
            }
            
        }
        return redirect()->route('admin.listseller');
    }

    public function sellpackage($id)
    {
        $seller = Seller::find($id);
        $listpackage = Package::all();
        return view('admin.seller.sellpackage',['seller'=>$seller,'listpackage'=>$listpackage]);
    }
    public function penalize()
    {
        return view('admin.seller.penalize');
    }
    
    public function postsellpackage(Request $request)
    {
         // $this->validate($request,
         //    [
         //        'sellername'=>'required|min:3|max:50'
         //    ],
         //    [
         //        'name.required'=>'Bạn chưa nhập tên thể loại',
         //        'name.min'=>'Tên  loại giày phải dài hơn 3 -> 50 kí tự ' ,
         //        'name.max'=>'Tên  loại giày hơn 3 -> 50 kí tự ',
         //    ]);
        $data  = explode("-",$request->packagename);
        $namepackage = $data[0];
        $money = $data[1];
        $quantity = $data[2];

        $receipt = new Receipt();
        $receipt->idseller = $request->seller;
        $receipt->idemployee = Auth::guard('admin')->user()->id;
        $receipt->namepackage = $namepackage;
        $receipt->newquantity = $quantity;
        $receipt->money = $money;
        $receipt->packagequantity = $request->qty;
        $receipt->totalmoney = $request->qty*$money;
        $receipt->save();

        $seller = Seller::find($request->seller);
        $seller->newsquantity += $request->qty*$quantity;
        $seller->save();
        return redirect()->back()->with('thongbao','Nạp thành công !');
    }
}
