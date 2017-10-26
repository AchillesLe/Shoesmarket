@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href='{{url('admin/user/list')}}'>Nhóm người dùng</a>
        </li>
        <li class="breadcrumb-item active">Danh sách</li>
	</ol>
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Danh sách người dùng</div>
        <div class="card-body">
                    @if(session('thongbao'))
                        <div  class="alert alert-success" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã người dùng</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Ngày cập nhật</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($list as $user)
	              	<tr>
	                  <td>{{$user->iduser}}</td>
	                  <td>{{$user->name}}</td>
	                  <td>{{$user->email}}</td>
	                  <td>{{$user->updated_at}}</td>
	                  <td>	@if($user->isblock =='0')
	                  			{!!'<i class="fa fa-fw  fa-check-circle" style="color:#4CAF50"></i><b>Hoạt động</b>'!!} 
	                  		@elseif(($user->isblock=='1'))
	                  			{!!'<i class="fa fa-fw fa-minus-circle" style="color:#ff1a1a"></i><b>Đang khoá</b>'!!}
	                  		@endif</td>
	                  <td width="170px">
	                  	@if($user->isblock=='0') 
	                  	<a href="{!! url('/admin/user/edit',[$user->iduser]) !!}"><button class="btn btn-warning" name="block"  >Khoá</button></a>
	                  	@elseif($user->isblock=='1')
	                  	<a href="{!! url('/admin/user/edit',[$user->iduser]) !!}"><button class="btn btn-success" name="active"  >Mở khoá</button></a>
	                  	@endif
	                  	<a href="{{url('admin/user/detail',[$user->iduser])}}"><button class="btn btn-info" name="detail"  id="detail">Chi tiết</button></a>
	                  	<a href="{{url('admin/user/delete',[$user->iduser])}}"><button class="btn btn-danger" name="delete"  id="delete" style="margin-top: 5px; width: 113px;">Xoá</button><a>
	                  	</td>
	                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} Người dùng</div>
      </div>
      <script type="text/javascript">
      	$(document).ready(function() {
      		
      	});
      </script>
@endsection