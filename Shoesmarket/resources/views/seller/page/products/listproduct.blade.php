@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
  @if($seller->isblock == 1)
  <h3>Tài khoản đã bị khóa, chỉ xem không thể thao tác</h3>
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
                  <th>Ngày tạo</th>
                  <th>Trạng thái</th>
                  <th></th>
                  <!--<th>Mô tả</th>-->
                </tr>
              </thead>
              <tbody>
              @foreach($listproduct as $product)
              <?php $listproductcolor=App\Productcolor::where('idproduct',$product->id)->get();
                    $totalquantity=0;
                    foreach ($listproductcolor as $productcolor) {
                      $totalquantity+=$productcolor->quantity;
                    }
               ?>
                <tr>
                  <td>{!! $product->id !!}</td>
                  <td>{!! $product->name !!}</td>
                  <td>
                    @if($product->sex == 1)
                      Nam
                    @elseif($product->sex == 2)
                      Nữ
                    @else
                      Cả Nam và Nữ
                    @endif
                  </td>
                  <td>{!! $totalquantity !!}</td>
                  <td>{!! $product->price !!}</td>
                  <td>{!! $product->created_at !!}</td>
                  <td style="text-align:center">
                    @if($product->status == 0)
                      <div class="btn btn-success">Hiện</div>
                    @else
                      <div class="btn btn-danger">Ẩn</div>
                    @endif
                  </td>
                  <td>
                    <a href="{!! route('detailProduct',$product->id) !!}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Chi tiết</a> 
                    <!--<button type="submit" class="btn btn-success">Ân/Hiện</button>-->
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  @else
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
                  <th>Ngày tạo</th>
                  <th>Trạng thái</th>
                  <!--<th>Mô tả</th>-->
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($listproduct as $product)
              <?php $listproductcolor=App\Productcolor::where('idproduct',$product->id)->get();
                    $totalquantity=0;
                    foreach ($listproductcolor as $productcolor) {
                      $totalquantity+=$productcolor->quantity;
                    }
               ?>
                <tr>
                  <td>{!! $product->id !!}</td>
                  <td>{!! $product->name !!}</td>
                  <td>
                    @if($product->sex == 1)
                      Nam
                    @elseif($product->sex == 2)
                      Nữ
                    @else
                      Cả Nam và Nữ
                    @endif
                  </td>
                  <td>{!! $totalquantity !!}</td>
                  <td>{!! $product->price !!}</td>
                  <td>{!! $product->created_at !!}</td>
                  <td style="text-align:center">
                    @if($product->status == 0)
                      <div class="btn btn-success">Hiện</div>
                    @else
                      <div class="btn btn-danger">Ẩn</div>
                    @endif
                  </td>
                  <td>
                    <a href="{!! route('detailProduct',$product->id) !!}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Chi tiết</a>               
                    <!--<button type="submit" class="btn btn-success">Ân/Hiện</button>-->
                  </td>
                  <td>
                    <a href="{!! route('changeStatusProduct',$product->id) !!}" class="btn btn-primary"><i class="fa fa-power-off" aria-hidden="true"></i> Ẩn/Hiện </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    @endif
@endsection