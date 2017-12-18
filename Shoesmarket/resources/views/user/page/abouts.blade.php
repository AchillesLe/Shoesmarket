@extends('user.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giới thiệu</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ url('/home') }}">Trang chủ</a> / <span>Giới thiệu</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<h2 class="text-center wow fadeInDown">Luôn mong muốn mang đến tất cả khách dịch vụ tốt nhất</h2>
			<div class="space20">&nbsp;</div>
			<p class="text-center wow fadeInLeft">Những năm qua, nhờ sự nổ lực không ngừng nghỉ của các đội ngũ để phát triển website bán hàng trở nên phổ biến đến tất cả mọi người <br> Dưới đây là thành quả đạt được trong những năm vừa qua</p>
			<div class="space35">&nbsp;</div>

			<div class="row">
				<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<i class="fa fa-tags "></i>
						<p class="beta-counter-value timer numbers" data-to="258934" data-speed="2000">258934</p>
						<p class="beta-counter-title">Số lượt tiếp cận</p>
					</div>
				</div>
			<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<i class="fa fa-money"></i>				
						<p class="beta-counter-value timer numbers" data-to="19855" data-speed="2000">19855</p>
						<p class="beta-counter-title">Giao dịch</p>
					</div>
				</div>
				<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<i class="fa fa-users"></i>					
						<p class="beta-counter-value timer numbers" data-to="3568" data-speed="2000">3568</p>
						<p class="beta-counter-title">Thành viên</p>
					</div>
				</div>				
				<div class="col-sm-2 col-sm-push-2">
					<div class="beta-counter">
						<i class="fa fa-home "></i>
						<p class="beta-counter-value timer numbers" data-to="150" data-speed="2000">150</p>
						<p class="beta-counter-title">Trụ sở</p>
					</div>
				</div>
			</div> <!-- .beta-counter block end -->

			<div class="space50">&nbsp;</div>
			<hr />		
			<h3 class="text-center other-title wow fadeInDown">Những thành viên sáng lập</h3>
			
			<div class="space20">&nbsp;</div>
			<div class="row">
				<div class="col-sm-6 wow fadeInRight">
					<div class="beta-person media ">
					
						<img class="pull-left" src="source/Hinh/Khang.jpg" width="270px"  alt="">
					
						<div class="media-body beta-person-body">
							<h5>Nguyễn Bảo Duy Khang</h5>
							<h5 class="font-large">+Cổ đông kiêm trưởng bộ phận kĩ thuật</h5>
							<p>Những đống góp của anh luôn giúp cho website thuận tiện hơn các website khác rất nhiều, từ đó nâng tầm qui mô lên cho công ty.</p>
						
						</div>
					</div>
				</div>
				<div class="col-sm-6 wow fadeInRight">
					<div class="beta-person media ">
					
						<img class="pull-left" src="source/Hinh/bao.jpg" width="270px" height="285px" alt="">
					
						<div class="media-body beta-person-body">
							<h5>Lê Văn Bảo</h5>
							<h5 class="font-large">+Cổ đông kiêm trưởng bộ phận nhận sự</h5>
							<p>Là người luôn chọn ra những đội ngũ xuất sắc nhất để giúp công ty luôn thành công và đạt kết quả cao nhất.</p>
							
						</div>
					</div>
				</div>				
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection