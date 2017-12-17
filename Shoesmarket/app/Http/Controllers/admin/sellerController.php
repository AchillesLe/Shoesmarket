<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Seller;


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
        $Seller = Seller::find($id);

        return view('admin.seller.sellpackage',['seller'=>$seller]);
    }
    public function penalize()
    {
        return view('admin.seller.penalize');
    }
    
    public function postsellpackage(Request $request)
    {

        return view('admin.seller.sellpackage');
    }
}
