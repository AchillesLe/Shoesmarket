<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\penalize;

class penalizeController extends Controller
{
    public function index()
    {
        $list = penalize::orderBy('created_at','DESC')->get();
        return view('admin.penalize.list',['list'=>$list]);
    }
    public function create()
    {
        return view('admin.penalize.create');
    }

}
