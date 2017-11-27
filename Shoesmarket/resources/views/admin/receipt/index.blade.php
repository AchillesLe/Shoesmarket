@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Giao dịch nạp tin
        </li>
        <li class="breadcrumb-item active">danh sách giao dịch</li>
	</ol>
		<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i>danh sách giao dịch</div>
	        <div class="card-body">
	          <div class="table-bordered table-hover">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	              <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Người nạp</th>
	                  <th>Người mua</th>
	                  <th>Gói tin</th>
	                  <th>Số lượng tin</th>
	                  <th>Số tiền</th>
	                  <th>Ngày giao dịch</th>
	                </tr>
	              </thead>
	              <tbody>
	              @php($number=0)
	              	 @foreach($list as $receipt)
		              	<tr>
		                  <td >{{++$number}}</td>
		                  <td >{{$receipt->employee->name}}</td>
	                      <td >{{$receipt->seller->name}}</td>
		                  <td >{{$receipt->namepackage}}</td>
		                  <td >{{$receipt->newquantity}}</td>
		                  <td >{{$receipt->money}}</td>
		                  <td >{{$receipt->created_at}}</td>  
		                </tr>
	                @endforeach 
	              </tbody>
	            </table>
	          </div>
	        </div>
	        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} giao dịch</div>
      </div>

@endsection