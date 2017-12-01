@extends('user.master')
@section('content')

<div class="content" style="overflow: auto;">		
			<form action="{{url('/password/email')}}" method="post" class="beta-form-checkout">
				{{csrf_field()}}

					@if (session('status'))
		                        <div class="alert alert-success">
		                            {{ session('status') }}
		                        </div>
                    @endif
					
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4  style="margin-left: 200px;">Quên mật khẩu !</h4>
						<div class="space20" style="margin-bottom: 20px;">&nbsp;</div>
						<div class="form-block">
							<label for="email">Địa chỉ Email <span style="color: red;">*</span></label>
							<input  class="form-control" type="email" id="email" name="email" minlength="8" required>
							@if ($errors->has('email'))
		                        <label>&nbsp;</label><span class="help-block">
		                            <strong  style="color: red;">{{ $errors->first('email') }}</strong>
		                        </span>
                    		@endif
						</div>
						<div class="form-block">
							<label>&nbsp;</label><button type="submit" class="btn btn-primary">Gửi link reset mật khẩu </button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
			
</div>
@endsection