@extends('admin.master')
@section('content')
<div class="card mb-3 formaddemployee">
        <div class="card-header">
          <i class="fa fa-address-card-o"></i>Thêm  nhân viên
      	</div>
        <div class="card-body">
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
          <form action="{{url('admin/employee/update')}}" method="POST">
          		{{ csrf_field() }}
{{-- 		      <div class="form-group" hidden>
                  <label for="image" class="col-md-3">Ảnh</label>
                  <input class="form-control" type="file" name="image" >
          </div> --}}
          <div class="form-inline">
                  <label for="username" class="col-md-3"><b>Username</b></label>
                  <input class="form-control col-md-4" type="text" name="username"  >
          </div>
          <div class="form-inline">
                  <label for="pass" class="col-md-3"><b>Password</b></label>
                  <input class="form-control col-md-4" type="password" name="pass" value="123456" readonly> <span id="passexample">123456</span>
          </div>
          <div class="form-inline">
                  <label for="name" class="col-md-3"><b>Họ và Tên</b></label>
                  <input class="form-control col-md-4" type="text" name="name"  >
          </div>
          <div class="form-inline">
                  <label for="address" class="col-md-3"><b>Địa chỉ</b></label>
                  <textarea name="address" class="form-control col-md-4" rows="3">
                    
                  </textarea>
          </div>
          <div class="form-inline">
                  <label for="email" class="col-md-3"><b>Email</b></label>
                  <input class="form-control col-md-4" type="email" name="email"  >
          </div>
          <div class="form-inline">
                  <label for="phone" class="col-md-3"><b>Số điện thoại</b></label>
                  <input class="form-control col-md-4" type="number" name="phone" >
          </div>
          <div class="form-inline">
                  <label for="role" class="col-md-3"><b>Quyền</b></label>
                  <select name="role" class="form-control col-md-4">
                  	@foreach($listrole as $role)
                  		<option value="{{$role->idrole}}">{{$role->name}}</option>
                  	@endforeach
                  </select>
          	</div>
			<button class="btn btn-outline-primary" name="add" style="margin-top:10px;margin-left: 260px;">Thêm nhân viên</button>
			</form>
		</div>
	</div>
@endsection