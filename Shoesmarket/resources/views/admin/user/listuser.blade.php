@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href='{{url('admin/user/list')}}'>Nhóm Khách hàng</a>
        </li>
        <li class="breadcrumb-item active">Danh sách</li>
	</ol>
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Danh sách khách hàng</div>
        <div class="card-body">
                    @if(session('thongbao'))
                        <div  class="alert alert-success" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
          <div class="table-responsive">
            <table class="table table-bordered employtable" id="dataTable" width="100%" cellspacing="0">
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
	              	<tr data-id="{{$user->iduser}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-phone="{{$user->phone}}" data-status="{{$user->isblock}}" data-reason="{{$user->reason}}" data-created="{{$user->created_at}}" data-updated="{{$user->updated_at}}">
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
	                  	<a href="{!! url('/admin/user/edit',[$user->iduser]) !!}"><button class="btn btn-warning" data-target="#reason" name="block" >Khoá</button></a>
	                  	@elseif($user->isblock=='1')
	                  	<a href="{!! url('/admin/user/edit',[$user->iduser]) !!}"><button class="btn btn-success" name="active">Mở khoá</button></a>
	                  	@endif
	                  	<button class="btn btn-info" name="detail"  id="view" data-toggle="modal" data-target="#employinfo">Chi tiết</button></a>
	                  	</td>
	                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} Người dùng</div>
      </div>
<div class="modal fade" id="employinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin của người dùng</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="padding: 20px;">
          <div class="form-group">
                  <label for="id">Mã người dùng </label>
                  <input class="form-control" type="text" name="id" readonly >
          </div>
          <div class="form-group">
                  <label for="name">Tên</label>
                  <input class="form-control" type="text" name="name" readonly >
          </div>
          <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" readonly>
          </div>
          <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input class="form-control" type="text" name="phone" readonly>
          </div>
          <div class="form-group">
                  <label for="status">Trạng thái</label>
                  <input class="form-control" type="text" name="status" readonly>
          </div>
          <div class="form-group">
                  <label for="created_at">Ngày Tạo </label>
                  <input class="form-control" type="text" name="created_at" readonly>
          </div>
          <div class="form-group">
                  <label for="updated_at">Ngày cập nhật mới nhất </label>
                  <input class="form-control" type="text" name="updated_at" readonly>
          </div>
        </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
{{-- <div class="modal fade" id="reason" tabindex="-2" role="dialog" aria-hidden="true" aria-labelledby="lableModelreason">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lableModelreason">Lý do khoá khách hàng</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group" hidden id="reason">
                  <label for="reason">Lí do </label>
                  <textarea class="form-control" name="reason" rows="4" placeholder="Nhập lý do khoá khách hàng"></textarea>
        </div>
      </div>
    </div>
  </div>
</div> --}}
      <script type="text/javascript">
      	$(document).ready(function() {
      		$(".employtable").on('click','#view',function(){
            var row=$(this).closest("tr"); 
            var id = row.data("id");
            var name = row.data("name");
            var phone = row.data("phone");
            var email = row.data("email");
            var reason = row.data("reason");
            var status = row.data("status");
            var create_at = row.data("created");
            var update_at = row.data("updated");
            $('input[name=id]').val(id);
            $('input[name=name]').val(name);
            $('input[name=phone]').val(phone);
            $('input[name=email]').val(email);
            if(status=="1")
              $('input[name=status]').val("Đang khoá");
            else
              $('input[name=status]').val("Đang hoạt động");
            if(reason)
            {
              $('#reason').removeAttr("hidden"); 
              $('textarea[name=reason]').val(reason);
            }
            $('input[name=created_at]').val(create_at);
            $('input[name=updated_at]').val(update_at);
           });
      	});
      </script>
@endsection