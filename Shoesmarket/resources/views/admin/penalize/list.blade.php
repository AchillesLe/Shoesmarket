@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Xử phạt người bán
        </li>
        <li class="breadcrumb-item active">danh sách phiếu phạt</li>
	</ol>
		<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i>danh sách phiếu phạt</div>
	        <div class="card-body">
	          <div class="table-bordered table-hover">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	              <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Người lập phiếu</th>
	                  <th>Người bán</th>
	                  <th>Số tiền</th>
	                  <th>lí do</th>
	                  <th>Ngày lập phiếu</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@php($num=0)
	              	@foreach($list as $item)
		              	<tr>
		                  <td >{{++$num}}</td>
		                  <td >{{$item->employee->name}}</td>
	                      <td >{{$item->seller->name}}</td>
		                  <td >{{$item->money}}</td>
		                  <td >{{$item->reason}}</td>
		                  <td >{{$item->created_at}}</td>  
		                </tr>
	                @endforeach
	              </tbody>
	            </table>
	          </div>
	        </div>
	        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} giao dịch</div>
      	</div>

@endsection