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
                  <th>Mã tin</th>
                  <th>Tên bản tin</th>
                  <th>Dành cho</th>
                  <th>Đăng ngày</th>
                  <th>Trạng thái</th>
                  <!--<th>Mô tả</th>-->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Mã tin</th>
                  <th>Tên bản tin</th>
                  <th>Dành cho</th>
                  <th>Đăng ngày</th>
                  <th>Trạng thái</th>
                  <!--<th>Mô tả</th>-->
                </tr>
              </tfoot>
              <tbody>
              @foreach($listproduct as $product)
              <?php $news=App\News::where('idproduct',$product->id)->first(); ?>
                <tr>
                  <td>{!! $news->id !!}</td>
                  <td>{!! $news->name !!}</td>
                  <td>
                    @if($product->sex == 1)
                      Nam
                    @elseif($product->sex == 2)
                      Nữ
                    @else
                      Cả Nam và Nữ
                    @endif
                  </td>
                  <td>{!! $news->created_at !!}</td>
                  
                  <td style="text-align:center">
                    @if($news->status == 0)
                      <div class="btn btn-success">Active</div>
                    @else
                      <div class="btn btn-danger">Block</div>
                    @endif
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
                  <th>Mã tin</th>
                  <th>Tên bản tin</th>
                  <th>Dành cho</th>
                  <th>Đăng ngày</th>
                  <th>Trạng thái</th>
                  <!--<th>Mô tả</th>-->
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Mã tin</th>
                  <th>Tên bản tin</th>
                  <th>Dành cho</th>
                  <th>Đăng ngày</th>
                  <th>Trạng thái</th>
                  <!--<th>Mô tả</th>-->
                  <th>Thao tác</th>
                </tr>
              </tfoot>
              <tbody>
              @foreach($listproduct as $product)
              <?php $news=App\News::where('idproduct',$product->id)->first(); ?>
                <tr>
                  <td>{!! $news->id !!}</td>
                  <td>{!! $news->name !!}</td>
                  <td>
                    @if($product->sex == 1)
                      Nam
                    @elseif($product->sex == 2)
                      Nữ
                    @else
                      Cả Nam và Nữ
                    @endif
                  </td>
                  <td>{!! $news->created_at !!}</td>
                  
                  <td style="text-align:center">
                    @if($news->status == 0)
                      <div class="btn btn-success">Active</div>
                    @else
                      <div class="btn btn-danger">Block</div>
                    @endif
                  </td>
                  <td>
                    <a href="{!! route('getEditNews',$news->id) !!}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa tin </a>
                    <a href="{!! route('changeStatusNews',$news->id) !!}" class="btn btn-primary"><i class="fa fa-power-off" aria-hidden="true"></i> Active/Block </a>
                    <!--<button type="submit" class="btn btn-success">Ân/Hiện</button>-->
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