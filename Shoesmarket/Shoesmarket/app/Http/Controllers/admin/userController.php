<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;

class userController extends Controller
{
    public function getlist()
    {
    	$list = user::all();
    	return view('admin/user/listuser',['list'=>$list]);
    }
    public function editStatus($id)
    {
    	$user = user::where('id',$id)->get()->first();
    	if($user->isblock=='1')
    		user::where('id',$id)->update(['isblock'=>'0']);
    	if($user->isblock=='0')
    		user::where('id',$id)->update(['isblock'=>'1']);
    	return redirect(url('admin/user/list'));
    }
}
