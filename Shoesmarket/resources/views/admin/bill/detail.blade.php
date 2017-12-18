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
	                  <th>#</th>
	                  <th>Tên Sản phẩm</th>
	                  <th>Màu sắc</th>
	                  <th>Size</th>
	                  <th>Số lượng</th>
	                  <th>Giá</th>
	                  <th>Người bán</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@php($number=0)
	              	 @foreach($listdetailbill as $item)
		              	<tr >
		                  <td >{{++$number}}</td>
		                  <td >{{$item->productcolor->product->name}}</td>
		                  <td >{{$item->productcolor->color}}</td>
		                  <td >{{$item->productcolor->size}}</td>
		                  <td >{{$item->productcolor->quantity}}</td>
		                  <td >{{number_format($item->productcolor->product->price,0,',','.')}}</td>
		                  <td >{{$item->billSeller->seller->name}}</td>
		                </tr>
	                 @endforeach 
	              </tbody>
	            </table>
	          </div>
	        </div>
	        <div class="card-footer small text-muted">Tổng cộng {{count($listdetailbill)}} Chi tiết</div>
      </div>
      <div class="col-md-2" >
			<a  class="form-control btn btn-primary" href="{{route('admin.bill')}}">Quay lại</a>
	</div>
@endsection