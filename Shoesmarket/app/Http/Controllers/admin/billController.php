<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bill;

class billController extends Controller
{
    public function index()
    {
        $list = bill::orderBy('created_at','DESC')->get();
        return view('admin.bill.index',['list'=>$list]);
    }

}
