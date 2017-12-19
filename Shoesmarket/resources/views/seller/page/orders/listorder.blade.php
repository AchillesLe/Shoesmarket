@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách đơn hàng</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã đơn hàng</th>
                  <th>Tổng tiền</th>
                  <th>Phí ship</th>
                  <th>Tình trạng</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
              @foreach($listbill as $billseller)
                <tr>
                  <td>{!! $billseller->idbill !!}</td>
                  <td>{!! $billseller->total !!}</td>
                  <td>{!! $billseller->shipfee !!}</td>
                  <td style="text-align:center">
                    @if($billseller->status == 0)
                      <div class="btn btn-warning">Chờ xử lý</div>
                    @elseif($billseller->status == 1)
                      <div class="btn btn-primary">Đang xử lý</div>
                    @elseif($billseller->status == 2)
                      <div class="btn btn-success">Hoàn thành</div>
                    @else
                      <div class="btn btn-danger">Hủy bỏ</div>
                    @endif
                  </td>
                  <td> 
                    <a href="{!! route('getDetailBill',$billseller->id) !!}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Chi tiết</a>
                    @if($billseller->status == 0 || $billseller->status == 1)
                    <a href="{!! route('completeBill',$billseller->id) !!}" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Thay đổi </a>
                    <a href="{!! route('cancelBill',$billseller->id) !!}" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Hủy bỏ </a>
                    @endif
                    <!--<button type="submit" class="btn btn-success">Ân/Hiện</button>-->
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection