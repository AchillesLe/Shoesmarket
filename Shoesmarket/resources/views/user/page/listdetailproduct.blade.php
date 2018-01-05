@extends('user.master')
@section('content')
	
	<div id="content">
<h1>Danh sách sản phẩm đã mua </h1>
<br>
                    @if(session('thongbao'))
                        <div  class="alert alert-success" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table-order" cellspacing="0" style="padding: 5px;">
					<thead>
						<tr>
							<th class="product-name-order" width="340px">Product</th>
							<th class="product-date-order">Ngày mua</th>
							<th class="product-price-order">Shop</th>
							<th class="product-quantity-order">số lượng</th>
							<th class="product-subtotal-order">Tổng tiền</th>
							<th class="product-status-order">Trạng thái</th>
							<th class="product-acti-order">Hành động</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $list as $item)
							<tr class="cart_item" data-id="{{$item->id}}">
								<td class="product-name" >
									<div class="media">
										<img class="pull-left" src="{{asset('source/Upload')}}/{{$item->image}}" alt="Đây là ảnh"  style="margin-left: 5px; width: 150px;height: 165px">
										<div class="media-body">
											<p class="font-large table-title" >{{$item->prname}}</p>
											<br>
											<p class="table-option" name="color" data-val="{{$item->color}}">Màu: {{$item->color}}</p>
											<br>
											<p class="table-option" name="size" data-val="{{$item->size}}">Size: {{$item->size}}</p>
											<br>
											<p class="table-option" name="size" data-val="{{$item->price}}">giá: {{number_format($item->price,0,",",".") }} VNĐ</p>
											<br>
										</div>
									</div>
								</td>
								<td class="product-price">
									<span class="price" >{{$item->created_at}}</span>
								</td>
								<td class="product-price">
									<span class="price" >{{$item->name}}</span>
								</td>

								<td class="product-quantity">
										{{$item->quantity}}
								</td>

								<td class="product-subtotal">
									<span id="subtotal">{{number_format(($item->total),0,",",".")}} VNĐ</span>
								</td>
								<td class="product-status">
									@if($item->status=='0')
										 Chờ xử lý
									@elseif($item->status=='1') 
										Đang xử lý 
									@elseif($item->status=='2') 
										Hoàn Thành 
									@elseif($item->status=='3')
										Huỷ
									@endif
								</td>
								<td>
									{{csrf_field()}}
									@if($item->status=='2' && $item->israting=='0')
										<button class="btn btn-success" id="rating"  data-toggle="modal" data-target="#ratingmodal">Đánh giá</button>
									@elseif($item->status!='3' && $item->status!='1' )
										<button class="btn btn-danger" id="cancel">Huỷ mua</button>
									@endif
								</td>
							</tr>
					    @endforeach

					</tbody>
				</table>
				<!-- End of Shop Table Products -->
			</div>
			
			<div class="clearfix"></div>
										
		</div> 
		<form action="" method="POST">
		<div class="modal fade" id="ratingmodal" tabindex="-1" role="dialog"  aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Đánh giá Shop</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

				<div id="star">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Lưu Đánh giá</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
<script>
	jQuery(document).ready(function($) {
 
	    jQuery('.beta-shopping-cart-table-order').on('click','#cancel',function(event) {
	    	if (confirm('bạn chắc chắn muốn huỷ sản phẩm này !')) {
			    $row=jQuery(this).closest("tr"); 
		    	$id = $row.data('id');
		    	$_token=jQuery('input[name="_token"]').val();
		    	jQuery.ajax({
				  url: 'productorder/upatestatus',
				  type: 'POST',
				  dataType: 'json',
				  cache:false,
				  data: {_token:$_token,id:$id},
				  success: function(data, textStatus, xhr) {
				  	$newdata=JSON.parse(data);
				   if($newdata==false)
				   {
				    	alert(" Có lỗi xảy ra ! .");
				   }
				   else
				   {
				   		$row.find("td:eq(5)").html('Huỷ');
				   		$row.find("td:eq(6)").text('');
				   }
				   
				  }
				});
			}
			 else {
			    
			}
	    	
	    });

	});
	</script>
@endsection
