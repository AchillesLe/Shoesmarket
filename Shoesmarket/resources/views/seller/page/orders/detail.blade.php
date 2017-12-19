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
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Màu sắc</th>
                  <th>Kích thước</th>
                  <th>Gía tiền</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                  <th>Tình trạng</th>
                  <th>Đánh giá</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
              @foreach($listdetailbill as $detailbill)
              <?php 
                    $productdetail=App\Product::findOrFail($detailbill->idproductcolor);
                    $productdetailcolor=App\Productcolor::findOrFail($detailbill->idproductcolor);
               ?>
                <tr>
                  <td>{!! $productdetail->id !!}</td>
                  <td>{!! $productdetail->name !!}</td>
                  <td>{!! $productdetailcolor->color !!}</td>
                  <td>{!! $productdetailcolor->size !!}</td>
                  <td>{!! $productdetail->price !!}</td>
                  <td>{!! $detailbill->quantity !!}</td>
                  <td>{!! $detailbill->total !!}</td>
                  <td style="text-align:center">
                    @if($detailbill->status == 0)
                      <div class="btn btn-warning">Chờ xử lý</div>
                    @elseif($detailbill->status == 1)
                      <div class="btn btn-primary">Đang xử lý</div>
                    @elseif($detailbill->status == 2)
                      <div class="btn btn-success">Hoàn thành</div>
                    @else
                      <div class="btn btn-danger">Hủy bỏ</div>
                    @endif
                  </td>
                  <td>
                    @if($detailbill->israting == 0)
                      <div class="btn btn-danger">Chưa đánh giá</div>
                    @else
                      <div class="btn btn-success">Đã đánh giá</div>
                    @endif
                  </td>
                  <td> 
                    @if($detailbill->status == 0 || $detailbill->status == 1)
                    <a href="{!! route('completeDetailBill',$detailbill->id) !!}" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Thay đổi </a>
                    <a href="{!! route('cancelDetailBill',$detailbill->id) !!}" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Hủy bỏ </a>
                    @endif
                    <!--<button type="submit" class="btn btn-success">Ân/Hiện</button>-->
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-header">Thông tin người mua</div>
          <div class="card-body">

            <div class="col-md-12">
              <label for="txtNameClient" class="col-md-3">Tên khách hàng</label>

              <div class="col-md-7">
                <input id="txtNameClient" type="text" class="col-md-12 form-control" name="txtNameClient" value="{!! $infoclient->name !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtPhoneClient" class="col-md-3">Số điện thoại</label>

              <div class="col-md-7">
                <input id="txtPhoneClient" type="number" class="col-md-12 form-control" name="txtPhoneClient" value="{!! $infobill->phone !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtEmailClient" class="col-md-3">Email</label>

              <div class="col-md-7">
                <input id="txtEmailClient" type="email" class="col-md-12 form-control" name="txtEmailClient" value="{!! $infoclient->email !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtHouseNumber" class="col-md-3">Số nhà</label>

              <div class="col-md-7">
                <input id="txtHouseNumber" type="text" class="col-md-12 form-control" name="txtHouseNumber" value="{!! $infobill->housenumber !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtStreetName" class="col-md-3">Tên đường</label>

              <div class="col-md-7">
                <input id="txtStreetName" type="text" class="col-md-12 form-control" name="txtStreetName" value="{!! $infobill->streetname !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtCountyName" class="col-md-3">Quận</label>

              <div class="col-md-7">
                <input id="txtCountyName" type="text" class="col-md-12 form-control" name="txtCountyName" value="{!! $infobill->countyname !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtCityName" class="col-md-3">Thành phố</label>

              <div class="col-md-7">
                <input id="txtCityName" type="text" class="col-md-12 form-control" name="txtCityName" value="{!! $infobill->city !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtDateBuy" class="col-md-3">Ngày mua</label>

              <div class="col-md-7">
                <input id="txtDateBuy" type="text" class="col-md-12 form-control" name="txtDateBuy" value="{!! $infobill->created_at !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtNoteBill" class="col-md-3">Ghi chú</label>

              <div class="col-md-7">
                <textarea class="col-md-12" rows="5" cols="150" name="txtNoteBill" disabled>{!! $infobill->note !!}</textarea>
              </div>
            </div>

          </div>
          <a href="{!! route('getListOrder') !!}" class="btn btn-primary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
        </div>
@endsection