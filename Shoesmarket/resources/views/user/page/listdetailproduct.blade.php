@extends('user.master')
@section('content')
	<h1>Danh sách  chi tiết đơn hàng </h1>
	<div id="content">

                    @if(session('thongbao'))
                        <div  class="alert alert-success" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Product</th>
							<th class="product-price">Giá</th>
							<th class="product-quantity">số lượng</th>
							<th class="product-subtotal">Tổng tiền</th>
							<th class="product-status">Trạng thái</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $listpro as $item)
							<tr class="cart_item">
								<td class="product-name" data-id="{{$item->id}}" data-rowid="{{$item->rowId}}">
									<div class="media">
										<img class="pull-left" src="{{asset('source/Upload')}}/{{$item->options->image}}" alt="Đây là ảnh">
										<div class="media-body">
											<p class="font-large table-title" >{{$item->name}}</p>
											<br>
											<p class="table-option" name="color" data-val="{{$item->options->color}}">Màu: {{$item->options->color}}</p>
											<br>
											<p class="table-option" name="size" data-val="{{$item->options->size}}">Size: {{$item->options->size}}</p>
											<br>
											<a class="table-edit" href="{{url('/edit',['id'=>$item->rowId])}}">Edit</a>
										</div>
									</div>
								</td>

								<td class="product-price">
									<span class="price" id="price">{{number_format($item->price,0,",",".")}}</span>
								</td>

								<td class="product-status">
									In Stock
								</td>

								<td class="product-quantity">
										<input class="form-control" type="number" id="qty"  name="qty" value="{{$item->qty}}" min="1" max="{{$item->options->qty}}" readonly style="text-align: center;">
								</td>

								<td class="product-subtotal">
									<span id="subtotal">{{number_format(($item->price*$item->qty),0,",",".")}}</span>
								</td>

								<td class="product-remove">
									<a href="{{url('removerorder',$item->rowId)}}" class="remove" title="Remove this item" id="removeorder" ><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
					    @endforeach

					</tbody>
				</table>
				<!-- End of Shop Table Products -->
			</div>



			{{-- <div class="cart-collaterals">

				
				<div class="cart-totals pull-right" style="width: 400px;">
					<div class="cart-totals-row"><h5 class="cart-total-title">Cart Totals</h5></div>
					<div class="cart-totals-row"><span>Tổng tiền giỏ hàng:</span> <span id="subitem">{{number_format($total,0,",",".")}} VNĐ</span></div>
					<div class="cart-totals-row"><span>Phí ship:</span> <span>Free Shipping</span></div>
					<div class="cart-totals-row"><span>Order Total:</span> <span id="totalitem">{{number_format($total,0,",",".")}} VNĐ</span></div>
					@if(Cart::count()>0)
					<div class="cart-totals-row" ><span style="margin-left: 50px"></span><a  class="btn btn-primary" style="width: 100px;height: 40px" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modelpayment">Mua ngay</a></div>
					@endif
				</div>
					
				<div class="clearfix"></div>
			</div> --}}
	
			
			<div class="clearfix"></div>

		</div> 
{{-- 		<form action="{{url('payment')}}" method="POST">
			{{csrf_field()}}
		<div class="modal fade" id="modelpayment" tabindex="-1" role="dialog" aria-labelledby="modelpayment" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		      	
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Thông tin nhận hàng</h4>
		      </div>
		      <div class="modal-body">
		      	<div class="form-group row">
				  <label for="example-password-input" class="col-2 col-form-label">Người nhận</label>
				  <div class="col-5">
				    <input class="form-control" type="text"  name="name" value="{{Auth::user()->name}}" readonly>
				  </div>
				</div>
		        <div class="form-group row">
				  <label for="example-tel-input" class="col-2 col-form-label">Địa chỉ giao hàng</label>
				  <div class="col-3	">
				    <input class="form-control" type="text" placeholder="Số nhà,phường/xã" name="homenumber" required>
				  </div>
		
				  <div class="col-2">
				    <input class="form-control" type="text" placeholder="Tên đường" name="street" required>
				  </div>
				 
				  <div class="col-3">
				    <select name="county" class="form-control">
				    	<option value="0">--Chọn Quận/Huyện--</option>
				    	@foreach($County as $item)
				    		<option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
				    </select>
				  </div>

				  <div class="col-2">
				    <input class="form-control" type="text" placeholder="Tỉnh/Thành" name="city" required>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-password-input" class="col-2 col-form-label">Số điện thoại</label>
				  <div class="col-5">
				    <input class="form-control" type="number" minlength="10" maxlength="11" required placeholder="Số điện thoại" name="phone">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-number-input" class="col-2 col-form-label">Ghi chú</label>
				  <div class="col-10">
				    <textarea class="form-control" name="note" placeholder="Nhập ghi chú khi giao hàng ở đây !" rows="3">
				    </textarea>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-datetime-local-input" class="col-2 col-form-label" >Tổng cộng</label>
				  <div class="col-5">
				    <input class="form-control" type="text" name="total" value="{{number_format($total,0,",",".")}} VNĐ" readonly required>
				  </div>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		        <button type="submit" class="btn btn-primary">Xác nhận</button>
		      </div>
		    </div>
		  </div>
		</div>
		</form> --}}
<script>
	jQuery(document).ready(function($) {
 
	  //   jQuery('.beta-shopping-cart-table').on('change','#qty',function(event) {
	  //   	$row=jQuery(this).closest("tr"); 
	  //   	$price = $row.find("td:eq(1)").text();
	  //   	$price = $price.replace('.','');
	  //   	$qty = jQuery(this).val();
	  //   	$subitem=$('span[id=subitem]').text();
	  //   	$totalitem=$('span[id=totalitem]').text();
	  //   	$color = jQuery('tr>td>div>div>p[name=color]').data('val');
	  //   	$size =  jQuery('tr>td>div>div>p[name=size]').data('val');
	  //   	$idpro =$row.find("td:eq(0)").data('id');
	  //   	$rowId = $row.find("td:eq(0)").data('rowId');
	  //   	$_token=jQuery('input[name="_token"]').val();
	  //   	jQuery.ajax({
			//   url: 'product/checkquantity',
			//   type: 'POST',
			//   dataType: 'json',
			//   cache:false,
			//   data: {_token:$_token,idpro:$idpro,color: $color,size : $size,qty:$qty},
			//   success: function(data, textStatus, xhr) {
			//   	$newdata=JSON.parse(data);
			//    if($newdata==false)
			//    {
			//     	alert(" Số lượng không đủ vui lòng chọn ít hơn .");
			//     	jQuery('input[name=qty]').val('1');
			//    }
			//    else
			//    {
			//    		$subtotal = $price*$qty;
			//    		$row.find("td:eq(4)").text($subtotal);
			//    		$newtotal={{Cart::total()}};
			//    		$('span[id=subitem]').text($newtotal);
			//    		$('span[id=totalitem]').text($newtotal);
			//    }
			   
			//   }
			// });
	  //   });

	});
	</script>
@endsection