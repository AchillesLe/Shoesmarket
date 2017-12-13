<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
class OrdersController extends Controller
{
	public function ListOrder($id)
	{
		return view('user.page.Order');
	}
	public function Order($id)
	{
		if($id > 0)
		{
			$product_buy = Product::find($id);
			if($product_buy!=null)
			{
				Cart::add(array(
				'id'=>$id,
				'name'=>$product_buy->name,
				'qty'=>1,
				'price'=>$product_buy->price,
				'option'=>array('image'=>'$product_buy->image','size'=>39)
				));
				dd(Cart::content());
			}
			
		}
		
		//return redirect()->back();
	}
}