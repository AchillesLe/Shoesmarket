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

								<td class="product-remove" data-id="$item->rowid">
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
					<div class="cart-totals-row"><span style="margin-left: 50px"></span><button type="submit" class="btn btn-primary" style="width: 100px;height: 40px">
						Mua Ngay 
					</button></div>
				</div>
					
				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			
			<div class="clearfix"></div>

		</div> 
		<script type="text/javascript">  


</script>
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