@extends('user.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ url('/home') }}">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Mẫu đơn liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<p>Trong quá trình giao dịch/trao đổi với nhau nếu bạn không hài lòng hoặc muốn đóng góp ý kiến giúp website tốt hơn vui lòng điền những thông tin cần thiết bên dưới để kịp thời hỗ trợ</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Họ và tên (Bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Địa chỉ (Bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Chủ đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Lời nhắn..."></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Tầng 5 tòa nhà Etown2 <br>
						364 đường Cộng Hòa, Quận Tân Bình,<br>
						TP.Hồ Chí Minh.
					</p>
					
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Nhân sự</h6>
					<p>
						Chúng tôi luôn tìm kiếm những người có tài năng<br>cùng tham gia vào công ty của chúng tôi.<br> 
						Gửi gmail: tuongvan120111@gmail.com 
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection