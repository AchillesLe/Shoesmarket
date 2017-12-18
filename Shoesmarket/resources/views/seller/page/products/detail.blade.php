@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Chi tiết sản phẩm</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Màu sắc</th>
                  <th>Kích cỡ</th>
                  <th>Số lượng</th>
                </tr>
              </thead>
              <tbody>
              @foreach($listdetailproduct as $detailproduct)
                <tr>
                  <td>{!! $detailproduct->color !!}</td>
                  <td>{!! $detailproduct->size !!}</td>
                  <td>{!! $detailproduct->quantity !!}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <a href="{!! route('getListProduct') !!}" class="btn btn-primary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
        </div>
@endsection