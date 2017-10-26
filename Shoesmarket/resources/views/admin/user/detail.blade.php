@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          User
        </li>
        <li class="breadcrumb-item ">{{$user->iduser}}</li>
	</ol>
	<div class="col-md-6">
		<div class="card card-outline-info mb-3">
		    <div class="card-header primary-color white-text ">Infomation</div>
		    <div class="card-body">

		<table class="detailuser-table">
			<tr><td>FullName :</td><td><input type="text" disabled class="form-control" id="fullname" value="{{$user->fullname}}"></td></tr>
			<tr><td>Name :</td><td><input type="text" disabled class="form-control" id="name" value="{{$user->name}}"></td></tr>
			<tr><td>Email :</td><td><input type="email" disabled class="form-control" id="email" value="{{$user->email}}"></td></tr>
			<tr><td>Phone :</td><td><input type="phone" disabled class="form-control" id="phone" value="{{$user->phone}}"></td></tr>
			<tr><td>Address :</td><td><input type="text" disabled class="form-control" id="address" value="{{$user->address}}"></td></tr>
			<tr><td>Tình trạng :</td><td><input type="radio" id="status" name="status" checked="checked" disabled>Đang hoạt động &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" disabled  id="status" name="status" @if($user->isblock=='1') {{'checked'}}@endif>Đang Khoá</td></tr>
		</table>
		    </div>
  		</div>
  		
	</div>
@endsection