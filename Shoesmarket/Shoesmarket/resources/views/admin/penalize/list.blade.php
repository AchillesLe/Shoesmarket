@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Xử phạt người bán
        </li>
        <li class="breadcrumb-item active">danh sách phiếu phạt</li>
	</ol>

	<p style="width: 150px;margin-bottom: 10px;">
		<a class="btn btn-success yess"  href="{{route('admin.penalize.create')}}"  >
		    Thêm phiếu phạt
		</a>
	</p>
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
	              	{{-- @foreach($list as $bill) --}}
		              	<tr>
		                  <td >1</td>
		                  <td >Admin</td>
	                      <td >Lê hoàng trung</td>
		                  <td >450000 VNĐ</td>
		                  <td >Rating 2 lần 1 sao</td>
		                  <td >11/8/2017 15:36:52</td>  
		                </tr>
		                <tr>
		                  <td >1</td>
		                  <td >Admin</td>
	                      <td >Lê hoàng trung</td>
		                  <td >450000 VNĐ</td>
		                  <td >Giao hàng trễ hạng</td>
		                  <td >11/8/2017 15:36:52</td>  
		                </tr>
		                <tr>
		                  <td >1</td>
		                  <td >Admin</td>
	                      <td >Lê hoàng trung</td>
		                  <td >450000 VNĐ</td>
		                  <td >hàng kém chất lượng</td>
		                  <td >11/8/2017 15:36:52</td>  
		                </tr>
	                {{-- @endforeach --}}
	              </tbody>
	            </table>
	          </div>
	        </div>
	        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} giao dịch</div>
      	</div>
{{-- <div class="modal fade " id="billinfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
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
					      <td>1000000</td>
					      <td>2</td>
					      <td>2000000</td>
					      <td>30000</td>
					      <td>Đang chờ</td>
					      <td>Lê Hoàng trung</td>
					    </tr>
					    <tr>
					      <td >giày da công sở</td>
					      <td>1000000</td>
					      <td>2</td>
					      <td>2000000</td>
					      <td>30000</td>
					      <td>Đang chờ</td>
					      <td>Lê Hoàng trung</td>
					    </tr>
					    <tr>
					      <td >giày da công sở</td>
					      <td>1000000</td>
					      <td>2</td>
					      <td>2000000</td>
					      <td>30000</td>
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