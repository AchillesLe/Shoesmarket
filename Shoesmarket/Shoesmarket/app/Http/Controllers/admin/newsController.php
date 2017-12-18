<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\news;
use App\product;
use App\seller;
use Illuminate\Support\facades\Hash;

class newsController extends Controller
{
	public function getDashboard()
    {

    	$list = news::orderBy('created_at','DESC')->get();
        $listseller = seller::where('isblock','1')->get();
        $number = count($listseller);
    	return view('admin.page.dashboard',['list'=>$list,'number'=>$number]);
    }
    public function detailsnew($id)
    {
    	$news = news::where('id',$id)->get()->first();
    	
    	return view('admin/page/detailsnew',['news'=>$news]);
    }

}
