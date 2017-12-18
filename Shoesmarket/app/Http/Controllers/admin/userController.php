<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class userController extends Controller
{
    public function getlist()
    {
    	$list = User::all();
    	return view('admin/user/listuser',['list'=>$list]);
    }
    public function editStatus($id)
    {
    	$user = User::where('id',$id)->get()->first();
    	if($user->isblock=='1')
    		User::where('id',$id)->update(['isblock'=>'0']);
    	if($user->isblock=='0')
    		User::where('id',$id)->update(['isblock'=>'1']);
    	return redirect(url('admin/user/list'));
    }
}
