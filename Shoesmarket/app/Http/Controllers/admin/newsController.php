<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\New;
use App\Product;
use App\Seller;
use Illuminate\Support\facades\Hash;

class newsController extends Controller
{
	public function getDashboard()
    {

    	$list = New::orderBy('created_at','DESC')->get();
        $listseller = Seller::where('isblock','1')->get();
        $number = count($listseller);
    	return view('admin.page.dashboard',['list'=>$list,'number'=>$number]);
    }
    public function detailsnew($id)
    {
    	$news = New::where('id',$id)->get()->first();
    	
    	return view('admin/page/detailsnew',['news'=>$news]);
    }

}
