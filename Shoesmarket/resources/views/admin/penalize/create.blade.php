@extends('admin.master')
@section('content')
  
  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          Nhóm người bán hàng
        </li>
        <li class="breadcrumb-item active">Phiếu phạt</li>
  </ol>
  <div class="card mb-3">
    <div class="card">
      <h3 class="card-header">Phiếu phạt người bán</h3>
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
            <label for="money" class="col-2 col-form-label">Số tiền nộp phạt</label>
            <div class="col-9">
              <input class="form-control" type="number" value="200000" min="0" max="10000000" name="money" id="money">
            </div>
          </div>
          <div class="form-group row">
            <label for="reason" class="col-2 col-form-label">Lý do</label>
            <div class="col-9">
              <textarea class="form-control" name="reason"></textarea> 
            </div>
          </div>
          <div class="col-md-12" align="center">
            <input type="submit" class="btn btn-primary" name="addpenalize" value="Lưu phiếu">
          </div>
          </form>
      </div>
    </div>
  </div>
@endsection