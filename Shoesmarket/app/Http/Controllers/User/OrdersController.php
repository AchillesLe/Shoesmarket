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
use App\County;
use App\Seller;
use App\Bill;
use App\Bill_seller;
use App\Detail_bill;
use Carbon\Carbon;
//use Request;
class OrdersController extends Controller
{
	public function ListOrder()
	{
		$content = Cart::content();
		$County = County::All();
		$total=str_replace(",","",Cart::total());
		return view('user.page.Order',['content'=>$content,'total'=>$total/(float)1.21,'County'=>$County]);
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
			$news = news::find($id);
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
									'idsubpro'=>$productcolor[0]->id,
									'namemeta'=>$news->name_meta
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

    	$this->validate($request,
            [
                'chbxsize'=>'required',

            ],
            [
                'chbxsize.required'=>'Bạn chưa chọn màu sắc và size ! .',
            ]);
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
            $news = news::find($idpro);
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
									'idsubpro'=>$productcolor->id,
									'namemeta'=>$news->name_meta
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
            $color =(Cart::get($rowId))->options->color;
            $size =(Cart::get($rowId))->options->size;
            $qty =(Cart::get($rowId))->qty;

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

	public function payment(Request $request)
	{
		$this->validate($request,
            [
                'name'=>'required',
                'homenumber'=>'required|min:1',
                'street'=>'required|min:3',
                'city'=>'required|min:3|max:50',
                'phone'=>'required|min:10|max:11',
                'total'=>'required',
            ],
            [
                'name.required'=>'Bạn chưa nhập có tên hãy cập nhật tên .',
                'homenumber.required'=>'Bạn chưa nhập tên ' ,
                'homenumber.min'=>'Số nhà ít nhất 1 kí tự ' ,
                'street.required'=>'Tên  gói tin hơn 3 -> 50 kí tự ',
                'street.min'=>'Tên đường ít nhất 3 kí tự ',
                'city.required'=>'Bạn chưa nhập tên thành phố . ',
                'city.min'=>'Tên thành phố ít nhất 3 kí tự . ',
                'city.max'=>'Tên thành phố không quá 40 kí tự . ',
                'phone.required'=>'Bạn chưa nhập Số điện thoại . ',
                'phone.min'=>'Số điện thoại ít nhất 10 chữ số . ',
                'phone.max'=>'Số điện thoại không quá 11 chữ số . ',
                // 'phone.numeric'=>'Số điện thoại phải là chuỗi số . ',
                // 'total.numeric'=>'Tổng tiền phải là chuỗi số . ',
            ]);
		$total=str_replace(",","",Cart::total());
		
		$homenumber = $request->homenumber;
		$street = $request->street;
		$city = $request->city;
		$phone = $request->phone;
		$county = $request->county;
		$note = $request->note;
		$name = $request->name;
		$tong=$total/(float)1.21;

		$bill = new Bill();
		$bill->iduser = Auth::user()->id;
		$bill->housenumber = $homenumber;
		$bill->streetname = $street;
		$bill->countyname = $county;
		$bill->city = $city;
		$bill->phone = $phone;
		$bill->total = $tong;
		$bill->created_at = Carbon::now()->toDateTimeString();
		$bill->note = $note;
		$bill->save();

		$items = Cart::content();
		$listseller  =  array();
		
		foreach($items as $item)
		{
			$product =Product::find($item->id);
			$idseller = $product->idseller;
			$tongtien = $item->price*$item->qty;
			$i = 0;
			if(count($listseller)>0)
			{
				foreach($listseller as $key => $value)
				{
					if($key == $idseller)
					{
						$listseller[$key]["total"] += $tongtien;
						break;
					}
					else
					{
						$listseller[$idseller]  = array('total' =>$tongtien ,'shipfee'=>0 );
					}	
					
				}
			}
			else
			{	
				$listseller[$idseller]  = array('total' =>$tongtien ,'shipfee'=>0 );
			}
		}

   		foreach ($listseller as $key => $value) {
   			
   			$bill_seller = new Bill_seller();
   			$bill_seller->idbill = $bill->id;
   			$bill_seller->idseller = $key;
   			$bill_seller->total = $value['total'];
   			$bill_seller->shipfee = $value['shipfee'];
   			$bill_seller->save();
   			foreach($items as $item)
   			{
   				if( (Product::find($item->id))->idseller == $key)
				{
					$detals_bill = new Detail_bill();
	   				$detals_bill->idbill_seller = $bill_seller->id;
	   				$detals_bill->idproductcolor = $item->options->idsubpro;
	   				$detals_bill->quantity = $item->qty;
	   				$detals_bill->total = $item->price*$item->qty;
	   				$detals_bill->save();
				}	
   			}
   		}
   		Cart::destroy();
   		return redirect()->back()->with('thongbao','Tạo đơn hàng thành công !');	

   		return redirect()->back()->with('thongbao','Có lỗi xảy ra.Chúng tôi xin lỗi về sự bất tiện này !');	
	}

}