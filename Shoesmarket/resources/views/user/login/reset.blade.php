@extends('user.master')
@section('content')
<div class="content" style="overflow: auto;">       
            <form action="{{url('/password/reset')}}" method="post" class="beta-form-checkout">
                {{csrf_field()}}
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                @endif
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row">        
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4 style="margin-left: 200px;">Đổi mật khẩu</h4>
                        <div class="space20" style="margin-bottom: 20px;">&nbsp;</div>
                        <div class="form-block">
                            <label for="email">Địa chỉ Email <span style="color: red;">*</span></label>
                            <input  class="form-control" type="email" id="email" name="email" required>
                            @if ($errors->has('email'))
                                <label>&nbsp;</label><span class="help-block">
                                    <strong  style="color: red;">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-block">
                            <label for="password">Mật khẩu <span style="color: red;">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="form-block">
                            <label for="password">Nhập lại Mật khẩu <span style="color: red;">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                    <label>&nbsp;</label><span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-block">
                            <label>&nbsp;</label><button type="submit" id="changepass" class="btn btn-primary">Đổi mật khẩu</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
            
</div>
<script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#password_confirmation').on('input',function(e){
                $pass = jQuery('#password').val();
                $pass_2 = jQuery('#password_confirmation').val();
                if($pass_2==$pass)
                {
                    jQuery('#changepass').removeAttr('hidden');
                    jQuery('#password_confirmation').css('border-color', '#ccc');
                }
                else
                {
                    jQuery('#changepass').attr('hidden');
                    jQuery('#password_confirmation').css('border-color','#ff1a1a');
                }
            });
        });
</script>
@endsection

