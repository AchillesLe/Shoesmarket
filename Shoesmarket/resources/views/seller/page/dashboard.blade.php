@extends('Seller.master')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
</ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-newspaper-o"></i>
              </div>
              <div class="mr-5">{!! $countnews !!} tin đã đăng</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-product-hunt"></i>
              </div>
              <div class="mr-5">{!! $countproduct !!} sản phẩm</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">{!! $countbill !!} đơn hàng</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-newspaper-o"></i>
              </div>
              <div class="mr-5">{!! $seller->newsquantity !!} tin còn lại</div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-header">Thông tin người bán</div>
      <div class="card-body">
           <div class="col-md-12">
              <label for="txtNameSeller" class="col-md-3">Tên người bán</label>

              <div class="col-md-7">
                <input id="txtNameSeller" type="text" class="col-md-12 form-control" name="txtNameSeller" value="{!! $seller->name !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label class="col-md-5">Tình trạng tài khoản</label>

              <div class="col-md-5">
                @if($seller->isblock==0)
                <div class="btn btn-success">Active</div>
                @else
                <div class="btn btn-danger">Block</div>
                @endif
              </div>
            </div>

            @if($seller->isblock!=0)
            <div class="col-md-12">
              <label for="txtReasonSeller" class="col-md-3">Lý do</label>
              <div class="col-md-7">
                <input id="txtReasonSeller" type="text" class="col-md-12 form-control" name="txtReasonSeller" value="{!! $seller->reason !!}" disabled>
              </div>
            </div>
            @endif

            <div class="col-md-12">
              <label for="txtPhoneSeller" class="col-md-3">Số điện thoại</label>

              <div class="col-md-7">
                <input id="txtPhoneSeller" type="number" class="col-md-12 form-control" name="txtPhoneSeller" value="{!! $seller->phone !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtEmailSeller" class="col-md-3">Email</label>

              <div class="col-md-7">
                <input id="txtEmailSeller" type="email" class="col-md-12 form-control" name="txtEmailSeller" value="{!! $seller->email !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtAddressSeller" class="col-md-3">Địa chỉ</label>

              <div class="col-md-7">
                <input id="txtAddressSeller" type="text" class="col-md-12 form-control" name="txtAddressSeller" value="{!! $seller->address !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtCMNDSeller" class="col-md-3">CMND</label>

              <div class="col-md-7">
                <input id="txtCMNDSeller" type="text" class="col-md-12 form-control" name="txtCMNDSeller" value="{!! $seller->identification !!}" disabled>
              </div>
            </div>

            <div class="col-md-12">
              <label for="txtDateSeller" class="col-md-3">Ngày tạo</label>

              <div class="col-md-7">
                <input id="txtDateSeller" type="text" class="col-md-12 form-control" name="txtDateSeller" value="{!! $seller->created_at !!}" disabled>
              </div>
            </div>           
      </div>
      <!-- Area Chart Example-->
@endsection