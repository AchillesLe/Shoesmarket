<?php

namespace App\Http\Controllers\admin;

use Request;
use App\Http\Controllers\Controller;
use App\Penalize;
use App\Receipt;


class revenueController extends Controller
{
    public function revenue()
    {

    	return view('admin/revenue/revenue');
    }
    
    public function getrevenue(Request $request)
    {
    	echo "0";
    	if(Request::ajax())
		{
			$datestart = new date(Request::get('datestart'));
    		$datefinsh = new date(Request::get('datefinsh'));
    		return ($datestart.'-'.$datefinsh);
		}
    	echo "1";
    }

}
