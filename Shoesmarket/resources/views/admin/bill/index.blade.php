@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Đơn hàng
        </li>
        <li class="breadcrumb-item active">danh sách đơn hàng</li>
	</ol>
		<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i>danh sách đơn hàng</div>
	        <div class="card-body">
	          <div class="table-responsive">
	            <table class="table table-bordered mytable" id="dataTable" width="100%" cellspacing="0">
	              <thead>
	                <tr >
	                  <th>#</th>
	                  <th>Người mua</th>
	                  <th>Địa chỉ nhận hàng</th>
	                  <th>Tổng tiền</th>
	                  <th>Ngày lập</th>
	                  <th>Hành động</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@php($number=0)
	              	 @foreach($list as $bill)
		              	<tr >
		                  <td >{{++$number}}</td>
		                  <td >{{$bill->user->name}}</td>
	                      <td >{{$bill->housenumber}} {{$bill->streetname}} , {{$bill->county->name}} ,{{$bill->city}}</td>
		                  <td >{{number_format($bill->total,0,',','.')}} VNĐ</td>
		                  <td >{{$bill->created_at}}</td>
		                  <td >
							<a class="btn btn-link" href="{{url('admin/bill/detail',$bill->id)}}">Xem chi tiết</a>
		                  </td>
		                </tr>
	                 @endforeach 
	              </tbody>
	            </table>
	          </div>
	        </div>
	        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} Đơn hàng</div>
      </div>
{{-- <div class="modal fade " id="billinfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 1000px;margin-left: -87px">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Thông tin của đơn hàng</h5>
	        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div>
      	<div class="modal-body">
	        <div style="padding: 10px;">
	          	<table class="table table-bordered table-hover tableinfo">
					  <thead class="thead-dark">
					    <tr>
					      <th >Tên Sản phẩm</th>
					      <th >Giá tiền</th>
					      <th >Số lượng</th>
					      <th >Tổng tiền</th>
					      <th >Phí ship</th>
					      <th >Trạng thái</th>
					      <th >Tên người bán</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td >giày da công sở</td>
					      <td>1000000 VNĐ</td>
					      <td>2</td>
					      <td>2000000 VNĐ</td>
					      <td>30000 VNĐ</td>
					      <td>Đang chờ</td>
					      <td>Lê Hoàng trung</td>
					    </tr>
					    <tr>
					      <td >giày da công sở</td>
					      <td>1000000 VNĐ</td>
					      <td>2</td>
					      <td>2000000 VNĐ</td>
					      <td>30000 VNĐ</td>
					      <td>Đang chờ</td>
					      <td>Lê Hoàng trung</td>
					    </tr>
					    <tr>
					      <td >giày da công sở</td>
					      <td>1000000 VNĐ</td>
					      <td>2</td>
					      <td>2000000 VNĐ</td>
					      <td>30000 VNĐ</td>
					      <td>Đang chờ</td>
					      <td>Lê Hoàng trung</td>
					    </tr>
					  </tbody>
				</table>
	        </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
      </div>
     </div>
    </div>
  </div>
</div> --}}
@endsection