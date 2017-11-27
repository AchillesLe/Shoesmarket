@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href='{{url('admin/user/list')}}'>Nhóm nhân viên</a>
        </li>
        <li class="breadcrumb-item active">Danh sách</li>
	</ol>
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Danh sách nhân viên</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered employtable" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên</th>
                  <th>SĐT</th>
                  <th>Ngày cập nhật</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($list as $employee)
                  @if($employee->id != 1)
  	              	<tr data-id="{{$employee->id}}" data-name="{{$employee->name}}" data-email="{{$employee->email}}" data-phone="{{$employee->phone}}" data-status="{{$employee->status}}" data-role="{{$employee->role}}" data-created="{{$employee->created_at}}" data-updated="{{$employee->updated_at}}">
  	                  <td>{{$employee->id}}</td>
  	                  <td>{{$employee->name}}</td>
                      <td>{{$employee->phone}}</td>
                      <td>{{$employee->updated_at}}</td>
  	                  
  	                  <td>	@if($employee->status =='0')
  	                  			{!!'<i class="fa fa-fw  fa-check-circle" style="color:#4CAF50"></i><b>Hoạt động</b>'!!} 
  	                  		@elseif(($employee->status=='1'))
  	                  			{!!'<i class="fa fa-fw fa-minus-circle" style="color:#ff1a1a"></i><b>Đang khoá</b>'!!}
  	                  		@endif</td>
  	                  <td width="170px">
  	                  	@if($employee->status=='0') 
  	                  	<a href="{!! url('/admin/employee/edit',[$employee->id]) !!}"><button class="btn btn-warning" data-target="#reason" name="block" >Khoá</button></a>
  	                  	@elseif($employee->status=='1')
  	                  	<a href="{!! url('/admin/employee/edit',[$employee->id]) !!}"><button class="btn btn-success" name="active">Mở khoá</button></a>
  	                  	@endif
  	                  	<button class="btn btn-info" name="detail"  id="view" data-toggle="modal" data-target="#employinfo">Chi tiết</button></a>
  	                  	</td>
  	                </tr>
                    @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} Người nhân viên</div>
      </div>
<div class="modal fade" id="employinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin của nhân viên</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="padding: 20px;">
          <div class="form-group" hidden>
                  <label for="image">Ảnh</label>
                  <input class="form-control" type="text" name="image" readonly >
          </div>
          <div class="form-group">
                  <label for="id">Mã nhân viên </label>
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
                  <label for="status">Quyền</label>
                  <input class="form-control" type="text" name="role" readonly>
          </div>
          <div class="form-group">
                  <label for="role">Trạng thái</label>
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

      <script type="text/javascript">
      	$(document).ready(function() {
      		$(".employtable").on('click','#view',function(){
            var row=$(this).closest("tr"); 
            var id = row.data("id");
            var name = row.data("name");
            var phone = row.data("phone");
            var email = row.data("email");
            var role = row.data("role");
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
            if(role=="1")
              $('input[name=role]').val("Quản lý");
            else
              $('input[name=role]').val("Nhân viên");
            $('input[name=created_at]').val(create_at);
            $('input[name=updated_at]').val(update_at);
           });
      	});
      </script>
@endsection