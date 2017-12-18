@extends('admin.master')
@section('content')
	
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Nhóm người bán hàng
        </li>
        <li class="breadcrumb-item active">Bán gói tin</li>
	</ol>
	<div class="card mb-3">
		<div class="card">
		  <h3 class="card-header">Phiếu bán gói tin</h3>
		  <div class="card-block" style="padding: 10px;">
		    	<form action="" method="POST" accept-charset="utf-8">
		    		 {{  csrf_field() }}
		    		<div class="form-group row">
					  <label for="employeesName" class="col-2 col-form-label">Người Lập phiếu</label>
					  <div class="col-9">
					    <input class="form-control" type="text" value="AAA" name="employeesName" id="employeesName" disabled>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="sellername" class="col-2 col-form-label">Tên người bán</label>
					  <div class="col-9">
					    <input class="form-control" type="text" value="Anh A" name="sellername" id="sellername" disabled>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="packagename" class="col-2 col-form-label">Gói tin</label>
					  <div class="col-9">
					    <select class="form-control" name="packagename">
					    	<option value="kimcuong-15000-15">kim cương - 150000 VNĐ / 15 tin</option>
					    	<option value="vang-15000-15">Vàng - 100000 VNĐ / 12 tin</option>
					    	<option value="bac-15000-15">bạc - 70000 VNĐ / 7 tin</option>
					    </select>
					  </div>
					</div>
					{{-- <div class="form-group row">
					  <label for="note" class="col-2 col-form-label">Ghi chú</label>
					  <div class="col-9">
					    <textarea class="form-control" name="note"></textarea> 
					  </div>
					</div> --}}
					<div class="col-md-12" align="center">
						<input type="submit" class="btn btn-primary" name="addreceipt" value="Lưu phiếu">
					</div>
		    	</form>
		  </div>
		</div>
	</div>
@endsection