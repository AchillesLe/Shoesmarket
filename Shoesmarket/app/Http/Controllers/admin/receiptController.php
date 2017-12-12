<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Receipts;

class receiptController extends Controller
{
    public function index()
    {
        $list = Receipts::orderBy('created_at','DESC')->get();
        return view('admin.receipt.index',['list'=>$list]);
    }

}
