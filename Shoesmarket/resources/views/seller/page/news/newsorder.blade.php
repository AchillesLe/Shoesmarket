@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Lịch sử mua gói tin</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Gói tin</th>
                  <th>Số lượng tin</th>
                  <th>Gía tiền</th>
                  <th>Số lượng gói</th>
                  <th>Thành tiền</th>
                  <th>Hình thức thanh toán</th>
                  <th>Ngày mua</th>
                </tr>
              </thead>
              <tbody>
              @foreach($listordernews as $ordernews)
                <tr>
                  <td>{!! $ordernews->namepackage !!}</td>
                  <td>{!! $ordernews->newquantity !!}</td>
                  <td>{!! $ordernews->money !!}</td>
                  <td>{!! $ordernews->packagequantity !!}</td>
                  <td>{!! $ordernews->totalmoney !!}</td>
                  <td>
                    @if($ordernews->idemployee == 1)
                    <div class="btn btn-primary"><i class="fa fa-paypal" aria-hidden="true"></i> Paypal</div>
                    @else
                    <div class="btn btn-success"><i class="fa fa-money"></i> Tiền mặt</div>
                    @endif
                  </td>
                  <td>{!! $ordernews->created_at !!}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection