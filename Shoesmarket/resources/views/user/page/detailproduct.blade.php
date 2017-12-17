@extends('user.master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Product</h6>
			</div>
{{-- 			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Product</span>
				</div>
			</div> --}}
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						
						<div class="col-sm-4">

							<img src="{{asset('source/Upload/')}}/{{$news->product->image}}" alt="Hình ảnh" width="150" height="200">
							<div id="shop"> {{$news->product->seller->name}}</div>
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								
								<p class="single-item-title" style="width: 500px;font-size: 22px;">{{$news->product->name}}</p>
								<p class="single-item-price">
									<span>{{$news->product->price}} VNĐ</span>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$news->name}}</p>
							</div>
							<div class="space20">&nbsp;</div>
<form action="{{url('updateOrder')}}" method="POST">
	{{csrf_field()}}
	<p hidden><input type="text" name="idpro" value="{{$news->product->id}}"></p>
	<p hidden><input type="text" name="idcart" value="{{$id}}"></p>
							<p >Options:</p>
							<br>
							<div class="single-item-options">
								@foreach($productcolor as $item)
									@if($item->quantity > 0)
										<div style="width: 150px;overflow: auto;float: left;">
											<div class="form-check">
												<label class="form-check-label">
											    <input class="form-check-input" type="radio" name="chbxsize" id="chbxsize" value="{{$item->color}}-{{$item->size}}" checked >
											   	{{$item->color}}-{{$item->size}}
											  	</label>
											</div>
										</div>
									@endif
								@endforeach

							</div>
						<div style="margin-top: 50px;">
							<input type="number" style="border: 1px solid black;border-radius: 3px ;width: 100px;line-height:30px; text-align: center;" name="qty" min="1"  value="1" required  >
							&nbsp;&nbsp;&nbsp;
						<button type="submit" style="width: 42px;border: 1px solid #4d4dff;border-radius: 1px;"><a class="add-to-cart" id="cartdetail"{{-- href="{{url('updateOrder')}}" --}} ><i class="fa fa-shopping-cart" id="_cart"></i></a></button>
						
						</div>
								<div class="clearfix"></div>
						</div>
						
					</div>
</form>
					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$news->note}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Các sản phẩm liên quan</h4>
						<br>
						<hr>
						<div class="row">
							@foreach($related as $item)
									<div class="col-md-3">
										<div class="item">
											<div class="single-item">
												<div class="single-item-header">
													<a href="{{url('detail',$item->product->id)}}"><img src="{{asset('source/Upload/')}}/{{$item->product->image}}" alt="" ></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{$item->product->name}}</p>
													<p class="single-item-price">
														<span>{{$item->product->price}} VNĐ</span>
													</p>
												</div>
											</div>
										</div>
									</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Các sản phẩm gần đây</h3>
						<div class="widget-body">
							@foreach($listnews as $item)
								<a class="pull-left" href="{{url('/detailproduct',$item->product->id)}}">
									<div class="beta-sales beta-lists">
										<div class="media beta-sales-item">
											<img src="{{asset('source/Upload')}}/{{$item->product->image}}" alt="" style="float: left;">
											<div class="media-body" style="float: left;">
												<p style="width: 165px;overflow: hidden;word-wrap: break-word;">{{$item->product->name}}</p>
												<p><span class="beta-sales-price">{{$item->product->price}} VNĐ</span></p>
											</div>
										</div>
									</div>
								</a>
							@endforeach
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		jQuery('input[name=quantity]').change(function(event) {
			event.preventDefault();
			$idpro = jQuery('input[name=idpro]').val();
			$size_color = jQuery('input[name=chbxsize]:checked').val();
			$color = ($size_color.split('-'))[0];
			$size = ($size_color.split('-'))[1];
			$qty = jQuery(this).val();
			$_token=jQuery('input[name="_token"]').val();
			jQuery.ajax({
			  url: 'product/checkquantity',
			  type: 'POST',
			  dataType: 'json',
			  cache:false,
			  data: {_token:$_token,idpro:$idpro,color: $color,size : $size,qty:$qty},
			  success: function(data, textStatus, xhr) {
			  	$newdata=JSON.parse(data);
			   if($newdata==false)
			   {
			    	alert(" Số lượng không đủ vui lòng chọn ít hơn .");
			    	jQuery('input[name=quantity]').val('1');
			   }
			    
			  }
			});
		});

		// jQuery('a #_cart').click(function(event) {
		// 			event.preventDefault();
		// 			$idpro = jQuery('input[name=idpro]').val();
		// 			$size_color = jQuery('input[name=chbxsize]:checked').val();
		// 			$color = ($size_color.split('-'))[0];
		// 			$size = ($size_color.split('-'))[1];
		// 			$qty = jQuery('input[name=quantity]').val();
		// 			$_token = jQuery('input[name="_token"]').val();
		// 			jQuery.post('updateOrder', {_token: $_token , idpro : $idpro , color : $color, size : $size , qty : $qty} , function( data, textStatus, xhr){
		// 				window.location.href = "list/order";
		// 			});
					
		// 		});

		});
	
</script>
@endsection