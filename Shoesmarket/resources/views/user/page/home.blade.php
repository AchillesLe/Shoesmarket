@extends('user.master')
@section('content')
<div class="rev-slider">
	<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<div class="bannercontainer" >
							    <div class="banner" >
									<ul>
											<!-- THE FIRST SLIDE -->
										<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
							            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
														<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('source/Upload/Slide/baner_slide_1.jpg')}}" data-src="{{asset('source/Upload/Slide/baner_slide_1.jpg')}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url({{asset('source/Upload/Slide/baner_slide_1.jpg')}}); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
														</div>
													</div>

							        	</li>
										<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
								          <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('source/Upload/Slide/baner_slide_2.jpg')}}" data-src="{{asset('source/Upload/Slide/baner_slide_2.jpg')}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url({{asset('source/Upload/Slide/baner_slide_2.jpg')}}); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
											</div>
										</li>
										<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
								            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
															<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('source/Upload/Slide/baner_slide_3.jpg')}}" data-src="{{asset('source/Upload/Slide/baner_slide_3.jpg')}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url({{asset('source/Upload/Slide/baner_slide_3.jpg')}}); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
														</div>
													</div>

								        </li>
									</ul>
								</div>
							</div>

							<div class="tp-bannertimer"></div>
						</div>
	</div>
				<!--slider-->
</div>

	
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					@php($N = $total)
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{$N}}  kiểu được tìm thấy</p>
								<div class="clearfix"></div>
							</div>
									{{-- @for($i=0;$i<count($listnew);$i++)	
									  	<div class="row">
											@for($j=0;$j<count($listnew[$i]);$j++)
												<div class="item">
													<div class="single-item">
														<div class="single-item-header">
															<a href="{{url('detail',$listnew[$i][$j]->product->id)}}"><img src="{{asset('source/Upload/')}}/{{$listnew[$i][$j]->product->image}}" alt="" ></a>
														</div>
														<div class="single-item-body">
															<p class="single-item-title">{{$listnew[$i][$j]->product->name}}</p>
															<p class="single-item-price">
																<span>{{$listnew[$i][$j]->product->price}} VNĐ</span>
															</p>
														</div>
														<div class="single-item-caption">
															<a class="add-to-cart pull-left" href="{{url('order',['id'=>$listnew[$i][$j]->product->id])}}"><i class="fa fa-shopping-cart"></i></a>
															<a class="beta-btn primary" href="{{url('/detailproduct',$listnew[$i][$j]->product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
															<div class="clearfix"></div>
														</div>
													</div>
												</div>
											@endfor
										</div>
										<div class="space50">&nbsp;</div>							
									@endfor --}}
									
									@foreach($listnew as $item)
									<div class="col-md-2">
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
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="{{url('order',$item->product->id)}}"><i class="fa fa-shopping-cart" id="_cart" data-id="{{$item->product->id}}"></i></a>
													<a class="beta-btn primary" href="{{url('/detail',$item->product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								
						</div>	

					</div> 
					<div align="center">
						{{ $listnew->links() }}
					</div>
				</div>
			</div> 
		</div> 
</div> 
</div>
<script type="text/javascript">
	// jQuery(document).ready(function($) {
	// 	jQuery('a #_cart').click(function(event) {
	// 		event.preventDefault();
	// 		$id = jQuery(this).data('id');
	// 		jQuery.ajax({
	// 		  url: 'order/'+$id,
	// 		  type: 'GET',
	// 		  cache:false,
	// 		  success: function(data, textStatus, xhr) {
	// 			   if(data=="success")
	// 			   {
	// 			    	alert(" Thêm vào giỏ hàng thành công .");
	// 			   }
	// 			   else if(data=="false")
	// 			   {
	// 			   	alert(" Thêm vào giỏ hàng thất bại .");
	// 			   }
	// 			    else{
	// 			    	window.location.href = "/login";
	// 			    }
	// 		  },error:(function(a,b,c) {
	// 		  	alert(a);
	// 		  })
	// 		});
			
	// 	});
	// });
</script>
@endsection