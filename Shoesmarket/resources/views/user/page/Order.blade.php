@extends('user.master')
@section('content')
	
	<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Product</th>
							<th class="product-price">Price</th>
							<th class="product-status">Status</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-subtotal">Total</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $content as $item)
							<tr class="cart_item">
								<td class="product-name">
									<div class="media">
										<img class="pull-left" src="{{asset('source/Upload')}}/{{$item->options->image}}" alt="Đây là ảnh">
										<div class="media-body">
											<p class="font-large table-title">{{$item->name}}</p>
											<br>
											<p class="table-option">Color: {{$item->options->color}}</p>
											<br>
											<p class="table-option">Size: {{$item->options->size}}</p>
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
										<input class="form-control" type="number" id="qty"  name="qty" value="{{$item->qty}}" min="1" max="{{$item->options->qty}}">
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


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">

				
				<div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title">Cart Totals</h5></div>
					<div class="cart-totals-row"><span>Cart Subtotal:</span> <span>{{number_format($total,0,",",".")}}</span></div>
					<div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div>
					<div class="cart-totals-row"><span>Order Total:</span> <span>{{number_format($total,0,",",".")}}</span></div>
					<div class="cart-totals-row"><span style="margin-left: 50px"></span><a  class="btn btn-primary" style="width: 100px;height: 40px" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modelpayment">Mua ngay</a></div>
				</div>
					
				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			
			<div class="clearfix"></div>

		</div> 
		<div class="modal fade" id="modelpayment" tabindex="-1" role="dialog" aria-labelledby="modelpayment" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Thông tin nhận hàng</h4>
		      </div>
		      <div class="modal-body">
		        <div class="form-group row">
				  <label for="example-tel-input" class="col-2 col-form-label">Địa chỉ giao hàng</label>
				  <div class="col-3	">
				    <input class="form-control" type="text" placeholder="Số nhà,phường/xã" name="homenumber">
				  </div>
				  {{-- <label for="example-tel-input" class="col-2 col-form-label">Số nhà </label> --}}
				  <div class="col-2">
				    <input class="form-control" type="text" placeholder="Tên đường" name="street">
				  </div>
				  {{-- <label for="example-tel-input" class="col-2 col-form-label">Quận/Huyện</label> --}}
				  <div class="col-2">
				    <input class="form-control" type="text" placeholder="Quận/Huyện" name="county">
				  </div>
				   {{-- <label for="example-tel-input" class="col-2 col-form-label">Tỉnh</label> --}}
				  <div class="col-2">
				    <input class="form-control" type="text" placeholder="Tỉnh/Thành" name="city">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-password-input" class="col-2 col-form-label">Password</label>
				  <div class="col-10">
				    <input class="form-control" type="password" value="hunter2" id="example-password-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-number-input" class="col-2 col-form-label">Number</label>
				  <div class="col-10">
				    <input class="form-control" type="number" value="42" id="example-number-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
				  <div class="col-10">
				    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-date-input" class="col-2 col-form-label">Date</label>
				  <div class="col-10">
				    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
				  </div>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
<script>
	jQuery(document).ready(function($) {
 
	    jQuery('.beta-shopping-cart-table').on('change','#qty',function(event) {
	    	var row=jQuery(this).closest("tr"); 
	    	var price =row.find("td:eq(1)").text();
	    		price = price.replace('.','');
	    	var qty = jQuery(this).val();
	    	var subtotal = price*qty;
	    	row.find("td:eq(4)").text(subtotal);	    	
	    });

	});
	</script>
@endsection