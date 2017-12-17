@extends('user.master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<h3>Danh mục</h3>
						<ul class="aside-menu">
							@foreach($listtype as $item)
								<li><a href="{{url('product',['sex'=>$sex,'name'=>$item->namemeta])}}">{{$item->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Các sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left" id="number">{{count($listnews)}} sản phẩm được tìm thấy </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($listnews as $item)
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
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="{{url('order',$item->product->id)}}"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="{{url('/detail',$item->product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
						<div class="space50">&nbsp;</div>
							
						</div> 
				</div>
			</div>

					<div align="center">
						{{ $listnews->links() }}
					</div>
			</div> 
		</div> 
	</div> 
@endsection
