@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách đơn hàng</div>
        <div class="card-body">
          <div class="col-md-12" style="float: left; margin-bottom: 15px">
            <div class="card-header">Thống kê</div>
            <div class="card-body col-md-12">
              <div class="col-md-5" style="float: left">
                  <label for="txtFromDate" class="col-md-3">Từ ngày</label>

                  <div class="col-md-9">
                    <input id="txtFromDate" type="date" class="form-control" name="txtFromDate" required autofocus>
                  </div>
              </div>

              <div class="col-md-6" style="float: left">
                  <label for="txtToDate" class="col-md-3">Đến ngày</label>

                  <div class="col-md-9">
                    <input id="txtToDate" type="date" class="form-control" name="txtToDate" required autofocus>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary" style="margin-top: 15px">Thống kê</button>

            </div>
          </div>
          <div class="col-md-12" style="float: left">
            <div class="card-header">Danh sách</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mã đơn hàng</th>
                      <th>Tổng tiền</th>
                      <th>Phí ship</th>
                      <th>Tình trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection