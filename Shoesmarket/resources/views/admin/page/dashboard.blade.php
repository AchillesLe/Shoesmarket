@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">{{$number}} người bán chờ duyệt </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('admin.listseller')}}" >
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Các giao dịch gần đây </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"  href="{{route('admin.receipt')}}">
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Danh sách đơn hàng gần đây</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('admin.bill')}}">
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">Danh sách phiếu phạt gần đây</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('admin.penalize')}}">
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
    </div>

    {{-- <div class="collapse" id="noti1">
      <div class="card mb-3 card-block"  aria-expanded="false">
        <div class="card-header">
          <i class="fa fa-area-chart"></i>Duyệt account người bán</div>
        <div class="card-body">
            
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="collapse" id="noti2">
      <div class="card mb-3" >
                  <div class="card-header">
                    <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-8 my-auto">
                        <canvas id="myBarChart" width="100" height="50"></canvas>
                      </div>
                      <div class="col-sm-4 text-center my-auto">
                        <div class="h4 mb-0 text-primary">$34,693</div>
                        <div class="small text-muted">YTD Revenue</div>
                        <hr>
                        <div class="h4 mb-0 text-warning">$18,474</div>
                        <div class="small text-muted">YTD Expenses</div>
                        <hr>
                        <div class="h4 mb-0 text-success">$16,219</div>
                        <div class="small text-muted">YTD Margin</div>
                      </div>
                    </div>
                  </div>
      </div>
    </div> --}}
    {{-- <div class="collapse" id="noti3">
      <div class="card mb-3 " >
                  <div class="card-header">
                    <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-8 my-auto">
                        <canvas id="myBarChart" width="100" height="50"></canvas>
                      </div>
                      <div class="col-sm-4 text-center my-auto">
                        <div class="h4 mb-0 text-primary">$34,693</div>
                        <div class="small text-muted">YTD Revenue</div>
                        <hr>
                        <div class="h4 mb-0 text-warning">$18,474</div>
                        <div class="small text-muted">YTD Expenses</div>
                        <hr>
                        <div class="h4 mb-0 text-success">$16,219</div>
                        <div class="small text-muted">YTD Margin</div>
                      </div>
                    </div>
                  </div>
      </div>
    </div> --}}
    <div class="card mb-3" >
      <div class="card-header">
        <i class="fa fa-table"></i> Danh sách tin đăng gần đây</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-">
              <tr>
                <th>#</th>
                <th style="word-wrap:break-word ">Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @php($id = 1)
              @foreach($list as $new)
                    <tr>
                      <td>{{$id++}}</td>
                      <td >{{$new->product->name}}</td>
                      <td><img src="{{asset('source/Upload').'/'.$new->product->image}}" width="130px" height="150px" alt="đây là ảnh"></td>
                      <td>{{$new->product->price}} VNĐ</td>
                      <td>@if($new->status=="0")Đang hiển thị @else Đang ẩn @endif</td>
                      <td>{{$new->created_at}}</td>
                      <td><a class="btn btn-primary"  href="{{url('admin/news/detail',$new->id)}}">Xem chi tiết</a></td>
                    </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Tổng cộng {{count($list)}} tin đăng</div>
     </div>
{{-- <div class="modal fade" id="newsinfo" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết của tin đăng</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="padding: 20px;" class="div-modalnewsinfo">
          <div class="form-group" hidden>
                  <label for="image">Ảnh</label>
                  <input class="form-control" type="text" name=""  readonly>
          </div>
          <div class="form-inline">
                  <label for="namepro" class="col-md-3"><b>Tên sản phẩm</b></label>
                  <input class="form-control col-md-9" type="text" name="namepro" readonly >
          </div>
          <div class="form-inline">
                  <label for="protype" class="col-md-3"><b>Loại sản phẩm</b></label>
                  <input class="form-control col-md-9" type="text" name="protype" readonly >
          </div>
          <div class="form-inline">
                  <label for="quantity" class="col-md-3"><b>Số lượng</b></label>
                  <input class="form-control col-md-9" type="text" name="quantity" readonly >
          </div>
          <div class="form-inline">
                  <label for="cost" class="col-md-3"><b>Giá</b></label>
                  <input class="form-control col-md-9" type="text" name="cost" readonly >
          </div>
          <div class="form-inline">
                  <label for="namepro" class="col-md-3"><b>Mô tả về sản phẩm</b></label>
                  <textarea class="form-control col-md-9" name="desc" readonly></textarea>
          </div>
          <div class="form-inline">
                  <label for="note" class="col-md-3"><b>Ghi chú</b></label>
                  <textarea class="form-control col-md-9" name="note" readonly></textarea>
          </div>
          <div class="form-inline">
                  <label for="status" class="col-md-3"><b>Trạng thái</b></label>
                  <input class="form-control col-md-9" type="text" name="status" readonly >
          </div>
          <div class="form-inline">
                  <label for="status" class="col-md-3"><b>Phí ship</b></label>
                  <input class="form-control col-md-9" type="text" name="status" readonly >
          </div>
        </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
      </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection
