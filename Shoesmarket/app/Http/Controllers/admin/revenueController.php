<?php

namespace App\Http\Controllers\admin;

// use Illuminate\Http\Request;
use Request;
use App\Http\Controllers\Controller;
use App\Penalize;
use App\Receipt;
use Illuminate\Support\Facades\DB;

class revenueController extends Controller
{
    public function revenue()
    {
               
    	return view('admin/revenue/revenue');
    }
    
    public function getrevenue(Request $request)
    {
		$datestart = date("Y-m-d H:i:s",strtotime(Request::get('datestart')));
		$datefinsh = date("Y-m-d H:i:s",strtotime(Request::get('datefinish')."+1 day"));
        $Penalize = DB::table('penalizes')->whereBetween('created_at',[$datestart,$datefinsh])->get();
        $Receipt = DB::table('receipts')->whereBetween('created_at',[$datestart,$datefinsh])->get();
        $tong = 0;
        foreach ($Penalize as $item) {
            $tong += $item->money;
        }
        foreach ($Receipt as $item) {
            $tong += $item->totalmoney;
        }

        $data = array('Penalize' => $Penalize, 'Receipt'=>$Receipt,'total'=>number_format($tong,0,',','.'));
		return  $data;
    }

}
