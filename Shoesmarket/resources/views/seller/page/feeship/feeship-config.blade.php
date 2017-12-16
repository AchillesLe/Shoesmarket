@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
  @if($seller->isblock == 1)
  <h2>Tài khoản đã bị khóa, không thể truy cập</h2>
  @else
      <div class="col-md-12 feeshipconfig">
        <div class="card col-md-12">
          <div class="card-header card bg-primary text-white">Cài đặt phí giao hàng</div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item"> 
                        <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          <i class="fa fa-building" style="font-size:30px;color:red"></i> Danh sách quận huyện
                        </a>
                      <div id="collapseOne" class="collapse show">

                        <div class="col-md-12">
                              @foreach($listcounty as $key => $county)
                              <div class="col-md-3 card" style="float: left; margin-bottom: 15px">
                                <div class="card-header" style="text-align:center">{{ $county->name }}</div>

                                <div class="card-body">
                                    
                                    <input type="number" class="form-control" name="feeshipOld" disabled></input>
                                  <input type="number" class="form-control" name="feeshipNew[]" placeholder="Nhập phí giao hàng mới">
                                </div>
                                 <div class="card-footer" style="text-align:center">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                   <a href="" class="btn btn-primary">Thay đổi</a>
                                 </div>
                              </div>
                              @endforeach
                            
                        </div>
                        
                      </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    @endif
@endsection