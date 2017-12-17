<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Productcolor;
use App\News as news;
use Illuminate\Support\Facades\DB;
use App\Type;
use Cart;
use Auth;
//use Request;
class OrdersController extends Controller
{
	public function ListOrder()
	{
		$content = Cart::content();
		$total=str_replace(",","",Cart::total());
		return view('user.page.Order',['content'=>$content,'total'=>$total/(float)1.21]);
	}
	private function Updatedatabase($idproduct,$color,$size,$quantity)
    {
    		$productcolor = Productcolor::where('idproduct',$idproduct)
                                            ->where('color',$color)
                                            ->where('size',$size)->first();
            if($productcolor!=null)
            {
            	if($productcolor->quantity > $quantity)
            	{
            		$productcolor->quantity -= $quantity;
            		$productcolor->save();
            		return true;
            	}
            }
			return false;
    }

	public function Order($id)
	{
		if(!Auth::check())
		{
			return redirect()->route('login');
		}
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
									'qty'=>$productcolor[0]->quantity,
									'idsubpro'=>$productcolor[0]->id
								)
				));
				if((new OrdersController)->Updatedatabase($id,$productcolor[0]->color,$productcolor[0]->size,1))
				{
					return  redirect()->back()->with('thongbao','Thêm vào giỏ hàng thành công!');//'success';
				}
				return  redirect()->back()->with('thongbao','Có vấn đề xảy ra trong lúc thêm vào giỏ hàng . Chúng tôi xin lỗi vì sự bất tiện này !');
			}
			
		}
		return redirect()->back();
	}
	public function UpdateOrder(Request $request)
    {	
    		$sizecolor = $request->chbxsize;
            $idpro = $request->idpro;
            $color = (explode('-',$sizecolor))[0];
            $size = (explode('-',$sizecolor))[1];
            $qty = $request->qty;
            $rowId = $request->idcart;
            if($rowId != "")
            {
            		Cart::remove($rowId);
            }
            
        	$product_buy = Product::find($idpro);
			$productcolor = Productcolor::where('idproduct',$idpro)
                                            ->where('color',$color)
                                            ->where('size',$size)->first();
            if($idpro > 0 && $color != null && $size > 0 && $qty > 0 )
            {
                Cart::add(array(
                'id'=>$idpro,
				'name'=>$product_buy->name,
				'qty'=>$qty,
				'price'=>$product_buy->price,
				'options'=>array('image'=>$product_buy->image,
									'size'=>$size,
									'color'=>$color,
									'qty'=>$productcolor->quantity,
									'idsubpro'=>$productcolor->id
								)
                ));
                (new OrdersController)->Updatedatabase($idpro,$color,$size,$qty);
            }
            
            

        return redirect()->route('list.order');
    }
    
    public function getedit($rowId)
	{
			$id = (Cart::get($rowId))->id;
			$news = news::where('idproduct',$id)->first();
            $productcolor = Productcolor::where('idproduct',$id)->get();
            $idtype = $news->product->idtype;
            $listnews = news::latest()->take(8)->get();   
            $related = news::whereIn('idproduct',function($q) use ($idtype){
            $q->from('products')->where('idtype',$idtype)->select('id')->get();
                    });
            $count = $related->count() >3 ? 4 : $related->count();  
                    $listrelated = $related->orderBy(DB::raw('RAND()'))->take($count)->get();
                       
            return view('user.page.detailproduct',['news'=>$news,'productcolor'=>$productcolor,'related'=>$listrelated,'listnews'=>$listnews,'id'=>$rowId]);
	}
	public function removerorder($rowId)
	{
		if($rowId != null)
		{
			$item = Cart::get($rowId);
			Cart::remove($rowId);
			(new OrdersController)->Updatedatabase($item->id,$item->options->color,$item->options->size,-$item->qty);

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