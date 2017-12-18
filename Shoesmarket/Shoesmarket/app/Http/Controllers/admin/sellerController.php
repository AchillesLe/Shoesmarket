<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\seller;


class sellerController extends Controller
{
    public function getlist()
    {
        $list = seller::orderBy('isblock','DESC')->get();//all()->sortBy('isblock');
    	return view('admin/seller/list',['list'=>$list]);
    }

    public function updatestatus($id)
    {
        $seller = seller::where('id',$id)->first();
        if(!empty($seller))
        {
            if($seller->isblock =='0')
            {
                seller::where('id',$id)->update(['isblock'=>'1']);
            }
            else 
            {
                seller::where('id',$id)->update(['isblock'=>'0']);
            }
            
        }
        return redirect()->route('admin.listseller');
    }

    public function sellpackage()
    {
        return view('admin.seller.sellpackage');
    }
    public function penalize()
    {
        return view('admin.seller.penalize');
    }
    
}
