@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Người mua
        </li>
        <li class="breadcrumb-item ">{{$user->id}}</li>
	</ol>
	<div class="col-md-6">
		<div class="card card-outline-info mb-3">
		    <div class="card-header primary-color white-text ">Thông tin</div>
		    <div class="card-body">
		<table class="detailuser-table">
			<tr>
				<td>Họ Tên :</td><td><input type="text" disabled class="form-control" id="name" value="{{$user->name}}"></td>
			</tr>
			<tr>
				<td>Địa chỉ Email :</td><td><input type="email" disabled class="form-control" id="email" value="{{$user->email}}"></td>
			</tr>
			<tr>
				<td>Số điện thoại :</td><td><input type="phone" disabled class="form-control" id="phone" value="{{$user->phone}}"></td>
			</tr>
			<tr>
				<td>Tình trạng :</td><td><input type="radio" id="status" name="status" checked="checked" disabled>Đang hoạt động &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" disabled  id="status" name="status" @if($user->isblock=='1') {{'checked'}}@endif>Đang Khoá</td>
			</tr>
		</table>
		    </div>
  		</div>
  		
	</div>
@endsection