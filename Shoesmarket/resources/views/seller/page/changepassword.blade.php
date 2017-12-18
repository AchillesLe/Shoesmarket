@extends('Seller.master')
@section('content')
<form class="form-horizontal" method="POST" action="{!! route('postChangePassword') !!}">
  {{ csrf_field() }}
      <div class="card-header">Đổi mật khẩu</div>
      <div class="card-body">
            <div class="form-group{{ $errors->has('pwCurrent') ? ' has-error' : '' }}">
                <label for="pwCurrent" class="col-md-4 control-label">Mật khẩu hiện tại</label>

                <div class="col-md-6">
                    <input id="pwCurrent" type="password" class="form-control" name="pwCurrent">

                    @if ($errors->has('pwCurrent'))
                      <span class="help-block">
                        <strong>{{ $errors->first('pwCurrent') }}</strong>
                      </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('pwNew') ? ' has-error' : '' }}">
                <label for="pwNew" class="col-md-4 control-label">Mật khẩu mới</label>

                <div class="col-md-6">
                    <input id="pwNew" type="password" class="form-control" name="pwNew">

                    @if ($errors->has('pwNew'))
                      <span class="help-block">
                        <strong>{{ $errors->first('pwNew') }}</strong>
                      </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('pwNewConfirm') ? ' has-error' : '' }}">
                <label for="pwNewConfirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>

                <div class="col-md-6">
                    <input id="pwNewConfirm" type="password" class="form-control" name="pwNewConfirm">

                    @if ($errors->has('pwNewConfirm'))
                      <span class="help-block">
                        <strong>{{ $errors->first('pwNewConfirm') }}</strong>
                      </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
            
      </div>
      <!-- Area Chart Example-->
@endsection