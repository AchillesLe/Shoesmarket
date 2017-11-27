@extends('admin.master')
@section('content')
	<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i>Chi tiết đơn hàng </div>
	        <div class="card-body">
	          <div class="table-responsive">
	            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
	              <thead>
	                <tr >
	                  <th>Mã sản phẩm </th>
	                  <th>Tên Sản phẩm</th>
	                  <th>Số lượng</th>
	                  <th>Giá</th>
	                  <th>Người bán</th>
	                  <th>Hành động</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@php($number=0)
	              	 @foreach($list as $bill)
		              	<tr >
		                  <td >{{++$number}}</td>
		                  <td >{{$bill->users->name}}</td>
	                      <td >{{$bill->housenumber}} {{$bill->streetname}} , {{$bill->county->name}}</td>
		                  <td >{{$bill->total}}</td>
		                  <td >{{$bill->created_at}}</td>
		                  <td >
							<a   href="{{url('admin//bill/detail/$bill->id')}}" >Xem chi tiết</a>
		                  </td>
		                </tr>
	                 @endforeach 
	              </tbody>
	            </table>
	          </div>
	        </div>
	        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} Đơn hàng</div>
      </div>
@endsection