<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penalize;
use App\Seller;
use Auth;

class penalizeController extends Controller
{
    public function index()
    {
        $list = Penalize::orderBy('created_at','DESC')->get();
        return view('admin.penalize.list',['list'=>$list]);
    }
    public function create($id)
    {
    	$seller = Seller::find($id);
        return view('admin.penalize.create',['seller'=>$seller]);
    }
    public function createpost(Request $request)
    {
    	$penalize = new Penalize();
    	$penalize->idseller = $request->idseller;
    	$penalize->idemployee =Auth::guard('admin')->user()->id;
    	$penalize->money = $request->money;
    	$penalize->reason = $request->reason;
    	$penalize->save();
        return redirect()->back()->with('thongbao','Tao phiếu phạt thành công !');
    }
}
