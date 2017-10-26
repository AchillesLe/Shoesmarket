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
    public function getdetail($iduser)
    {
    	$user = user::where('iduser',$iduser)->get()->first();
    	return view('admin/user/detail',['user'=>$user]);
    }
    public function delete($iduser)
    {
    	$user = user::where('iduser',$iduser)->delete();
        $list = user::all();
    	return view('admin/user/listuser',['list'=>$list]);
    }
    public function editStatus($iduser)
    {
    	$user = user::where('iduser',$iduser)->get()->first();
    	if($user->isblock=='1')
    		user::where('iduser',$iduser)->update(['isblock'=>'0']);
    	if($user->isblock=='0')
    		user::where('iduser',$iduser)->update(['isblock'=>'1']);
    	return redirect(url('admin/user/list'));
    }
}
