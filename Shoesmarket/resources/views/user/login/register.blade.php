@extends('user.master')
@section('content')
<div class="content" style="overflow: auto;">

					@if(count($errors)>0)
                        <div class="alert alert-danger" id="noti">
                            @foreach($errors->all() as $err)
                               {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div  class="alert alert-success" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
			<form action="{{url('/register')}}" method="post" class="beta-form-checkout">
				{{csrf_field()}}
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4 style="margin-left: 200px;">Đăng kí</h4>
						<div class="space20" style="margin-bottom: 20px;">&nbsp;</div>
						<div class="form-block">
							<label for="email">Địa chỉ email <span style="color: red;">*</span></label>
							<input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email">
						</div>
						<div class="form-block">
							<label for="your_last_name">Họ Tên <span style="color: red;">*</span></label>
							<input type="text"  class="form-control" id="your_last_name" name="name" required placeholder="Nhập họ tên">
						</div>
						<div class="form-block">
							<label for="phone">Số điện thoại <span style="color: red;">*</span></label>
							<input type="number" class="form-control" id="phone" name="phone" minlength="10" maxlength ="11" required placeholder="Nhập số điện thoại">
						</div>
						<div class="form-block">
							<label for="pass">Mật khẩu <span style="color: red;">*</span></label>
							<input type="password" class="form-control" id="pass" name="password" required >
						</div>
						<div class="form-block">
							<label for="pass_2">Xác nhận mật khẩu<span style="color: red;">*</span></label>
							<input type="password" class="form-control" id="pass_2" name="password_2" required>
						</div>
						<div class="form-block" id="Register" hidden>
							<label>&nbsp;</label><button type="submit"  class="btn btn-primary">Đăng kí</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
			</form>	
</div>
<div style="margin-bottom: 15px;"></div>
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#pass_2').on('input',function(e){
				$pass = jQuery('#pass').val();
				$pass_2 = jQuery('#pass_2').val();
				if($pass_2==$pass)
				{
					jQuery('#Register').removeAttr('hidden');
					jQuery('#pass_2').css('border-color', '#ccc');
				}
				else
				{
					jQuery('#Register').attr('hidden');
					jQuery('#pass_2').css('border-color','#ff1a1a');
				}
			});
		});
</script>
@endsection