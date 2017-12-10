@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách sản phẩm </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Dành cho</th>
                  <th>Số lượng</th>
                  <th>Gía</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Dành cho</th>
                  <th>Số lượng</th>
                  <th>Gía</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              @foreach($listproduct as $product)
                <tr>
                  <td>{!! $product->id !!}</td>
                  <td>{!! $product->name !!}</td>
                  <td>{!! $product->sex !!}</td>
                  <td>{!! $product->quantity !!}</td>
                  <td>{!! $product->price !!}</td>
                  <th class="alert alert-danger" style="text-align:center;">{!! $product->status !!}</th>
                  <td>
                    <button type="submit" class="btn btn-primary"> Sửa </button>
                    <button type="submit" class="btn btn-success"> Ẩn/Hiện </button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection