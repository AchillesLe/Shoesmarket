<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Receipt;

class receiptController extends Controller
{
    public function index()
    {
        $list = Receipt::orderBy('created_at','DESC')->get();
        return view('admin.receipt.index',['list'=>$list]);
    }

}
