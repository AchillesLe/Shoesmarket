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
                  
				    @php(session(['backUrl' => URL::previous()]))
                    @if(session('thongbao'))
                        <div  class="alert alert-danger" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif		
			<form action="{{url('/login')}}" method="post" class="beta-form-checkout">
				{{csrf_field()}}
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4 style="margin-left: 200px;">Đăng nhập</h4>
						<div class="space20" style="margin-bottom: 20px;">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Địa chỉ Email <span style="color: red;">*</span></label>
							<input  class="form-control" type="email" id="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="password">Mật khẩu <span style="color: red;">*</span></label>
							<input type="password" name="password" class="form-control" id="password" required>
						</div>
						<div class="form-block">
							<label style="margin-right: 2px;">&nbsp;</label><a href="{{url('/password/reset')}}" style="color: blue;">Quên mật khẩu ?</a>
						</div>
						<div class="form-block">
							<label>&nbsp;</label><button type="submit" class="btn btn-primary">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
			
</div>
@endsection