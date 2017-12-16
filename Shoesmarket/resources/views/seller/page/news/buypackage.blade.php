@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
      <form>
        <div class="col-md-12 ttthanhtoan">
          <div class="col-md-12 pricing-table">
          @foreach($list_newspackage as $newspackage)
          <div class="col-md-4 columns">
            <ul class="price">
              <li class="header" style="background-color:#FFD42F">{!! $newspackage->name !!}</li>
              <li class="grey">{!! $newspackage->money !!} VND</li>
              <li>{!! $newspackage->newquantity !!} tin đăng sản phẩm</li>
              <li class="grey"><a href="{!! url('sellercenter/cart',$newspackage->id) !!}" class="btn btn-primary">Mua</a></li>
            </ul>
          </div>
          @endforeach
        </div>
          <div class="card col-md-12">
            <div class="card-header card bg-primary text-white">Phương thức thanh toán</div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-paypal" style="font-size:30px; color:blue"></i> Thanh toán online qua Paypal</li>
                <li class="list-group-item"> 
                          <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <i class="fa fa-building" style="font-size:30px;color:red"></i> Thanh toán trực tiếp tại nơi đăng ký
                          </a>
                        <div id="collapseOne" class="collapse show">
                            Địa chỉ: 999 Đường A, Phường B, Quận C, TP.HCM
                            <br/>
                            Số điện thoại: 099199911
                        </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </form>
@endsection