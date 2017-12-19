@extends('user.master')
@section('content')
{{-- <div class="rev-slider">
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
</div> --}}

	
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<div class="beta-products-details">
								<p class="pull-left">{{$msg}}</p>
								<div class="clearfix"></div>
							</div>

									
									@foreach($listnews as $item)
									<div class="col-md-2">
										<div class="item">
											<div class="single-item">
												<div class="single-item-header">
													<a href="{{url('detail',$item->name_meta)}}"><img src="{{asset('source/Upload/')}}/{{$item->product->image}}" alt="" height="180px" width="165px" ></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{$item->name}}</p>
													<p class="single-item-price">
														<span>{{$item->product->price}} VNĐ</span>
													</p>
												</div>
												<div class="single-item-caption">
													<a class="beta-btn primary" style="width: 165px;text-align: center;" href="{{url('detail',$item->name_meta)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								
						</div>	

					</div> 
					<div align="center">
						{{ $listnews->links() }}
					</div>
				</div>
			</div> 
		</div> 
</div> 
</div>
<script type="text/javascript">

</script>
@endsection