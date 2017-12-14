<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Productcolor;
use Cart;
class OrdersController extends Controller
{
	public function ListOrder()
	{
		$content = Cart::content();
		return view('user.page.Order',['content'=>$content]);
	}

	public function Order($id)
	{

		if($id > 0)
		{
			$product_buy = Product::find($id);
			$productcolor = Productcolor::where('idproduct',$id)->get();
			if($product_buy!=null)
			{
				Cart::add(array(
				'id'=>$id,
				'name'=>$product_buy->name,
				'qty'=>1,
				'price'=>$product_buy->price,
				'options'=>array('image'=>$product_buy->image,
									'size'=>$productcolor[0]->size,
									'color'=>$productcolor[0]->color,
									'image'=>$productcolor[0]->image,
									'qty'=>$productcolor[0]->quantity,
									'idpro'=>$id
								)
				));
			}
			
		}
		return redirect()->back();
	}
	public function UpdateOrder($rowId)
	{
		
	}
	public function removerorder($rowId)
	{
		if($rowId != null)
		{
			Cart::remove($rowId);
		}
		return redirect()->back();
	}
	public function deleteorder()
	{
		if(Cart::count()>0)
        {
            Cart::destroy();
        }
	}
}