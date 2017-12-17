<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
							<li><a href="#" ><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
							<li><a data-toggle="modal" href="#modalogaout"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
						@else
							<li><a href="{{url('/register')}}">Đăng kí</a></li>
							<li><a href="{{url('/login')}}">Đăng nhập</a></li>
						@endif
						
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="modal fade" id="modalogaout" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Bạn muốn rời khỏi ?</h5>
{{-- 		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button> --}}
		      </div>
		      <div class="modal-body">
		      	@if(Cart::count()>0)
		        	<p>Nếu bạn chọn "Thoát" thì những món hàng bạn đã chọn trong giỏ hàng sẽ không được tính ! </p>
		        @endif
		        <p>Bạn chắc bạn muốn rời khỏi ?</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <a type="button" href="{{url('/logout')}}" class="btn btn-primary">Thoát</a>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{url('/')}}" id="logo">{{-- <img src="{{asset('source/Upload/Slide/avater.jpg')}}" style="border:0px;width: 150px;height: 90px;" > --}}<span style="font-size:26px; ">Shoes Market</span></a>
				</div>
				<div class="pull-right beta-components space-left ov"  id="header-right">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{url('search')}}">
					        <input type="text" value="" name="search" id="search" placeholder="Tìm giày , loại giày , người bán ." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng @if(count(Cart::content())== 0) (Trống)@endif<i class="fa fa-chevron-down"></i></div>
							@if(Auth::check()&&count(Cart::content())>0)
							<div class="beta-dropdown cart-body">
								@foreach( Cart::content() as $item)
									<div class="cart-item">
										<div class="media">
											<a class="pull-left" href="{{url('detail',$item->options->id)}}"><img src="{{asset('source/Upload/')}}/{{$item->options->image}}" alt="Ảnh"></a>
											<div class="media-body">
												<span class="cart-item-title">{{$item->name}}</span>
												<span class="cart-item-options">Color: {{$item->options->color}}&nbsp;--&nbsp;Size :{{$item->options->size}}</span>
												<span class="cart-item-amount">{{$item->qty}}*<span>{{$item->price}}</span>
											</div>
										</div>
									</div>
								@endforeach
								<div class="cart-caption">
									@php($total=str_replace(",","",Cart::total())/(float)1.21)
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format($total,0,",",".")}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('list.order')}}" class="beta-btn primary text-center">Đặt hàng<i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>

							@endif
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{url('/')}}">Trang chủ</a></li>
						<li><a href="{{url('productType/Nam')}}">Giày Nam</a></li>
						<li><a href="{{url('productType/Nu')}}">Giày Nữ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
</div> <!-- #header -->