@extends('admin.master')
@section('content')
<script type="text/javascript" language="javascript" src="sourceAdmin/ckeditor/ckeditor.js"></script>

	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          email
        </li>
        <li class="breadcrumb-item active">danh sách email</li>
	</ol>
					@if(count($errors)>0)
                        <div class="alert alert-danger" id="noti">
                            @foreach($errors->all() as $err)
                               {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                   @if(session('thongbao'))
                    <div  class="alert   @if(strpos(session('thongbao'), 'thành công') !== false) {{"alert-success"}} @else {{"alert-danger"}} @endif" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> danh sách email đã gửi</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tiêu đề</th>
                  <th>Người nhận</th>
                  <th>Ngày gửi</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	{{-- @foreach($list as $bill) --}}
	              	<tr>
	              	  <td >1</td>
	                  <td >Gửi thông báo phạt</td>
	                  <td >Lê Hoàng trung</td>
                      <td >25/11/2017</td>
	                  <td >
						<button class="btn btn-outline-primary" id="view"  type="button"  data-toggle="modal" data-target="#mailinfo" >Xem chi tiết</button>
	                  </td>
	                </tr>
                {{-- @endforeach --}}
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} email</div>
  	</div>

	<div class="modal fade " id="mailinfo" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content" style="width: 1000px;margin-left: -87px">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Thông tin email</h5>
		        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
	      	<div class="modal-body">
		        <div style="padding: 10px; " class="mailmodal">
		        	<div class="form-inline">
		          		<label for="mailFrom" class="col-md-3">Email From</label>
		          		<input class="form-control col-md-9" type="text" id="mailFrom" value="yuribokasgu@gmail.com" disabled>
		          	</div>
		        	<div class="form-inline">
		          		<label for="nameFrom" class="col-md-3">Người Gửi</label>
		          		<input class="form-control col-md-9" type="text" id="nameFrom" value="ShoesMarket" disabled>
		          	</div>
		          	
		          	<div class="form-inline">
		          		<label for="mailTo" class="col-md-3">Email To</label>
		          		<input class="form-control col-md-9" type="text" id="mailTo" value="lehoangtrung@gmail.com" disabled>
		          	</div>

		          	<div class="form-inline">
		          		<label for="nameTo" class="col-md-3">Người Nhận</label>
		          		<input class="form-control col-md-9" type="text" id="nameTo" value="Lê Hoàng Trung" disabled>
		          	</div>
		          	<div class="form-inline">
		          		<label for="title" class="col-md-3">Tiêu đề</label>
		          		<input class="form-control col-md-9" type="text" id="title" value="ShoesMarket" disabled>
		          	</div>
		          	<div class="form-inline">
		          		<label for="content" class="col-md-3">Nội dung</label>
						<textarea id="content" class="ckeditor" disabled>SSSSSSSSSSSSSSSSSSSSS</textarea>
		          	</div>
		        </div>
	      <div class="modal-footer">
	        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
	      </div>
	     </div>
	    </div>
	  </div>
	</div>
	
@endsection