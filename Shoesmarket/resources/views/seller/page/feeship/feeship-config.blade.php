@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->

      <div class="col-md-12 feeshipconfig">
        <div class="card col-md-12">
          <div class="card-header card bg-primary text-white">Cài đặt phí giao hàng</div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item"> 
                        <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          <i class="fa fa-building" style="font-size:30px;color:red"></i> Nội thành HCM
                        </a>
                      <div id="collapseOne" class="collapse show">

                        <div class="col-md-12">
                            <form class="form-inline">
                              @for($i=1;$i<=12;$i++)
                              <div class="col-md-4">
                                <span> <?php echo 'Q '.$i.':' ?> </span>
                                <input type="number" class="form-control" id="<?php echo 'district'.$i ?>" placeholder="Nhập phí giao hàng">
                              </div>
                              @endfor
                              <div class="col-md-12" style="margin-top: 15px;">
                                <button type="submit" class="col-md-2 btn btn-danger">Sửa</button>
                                <button type="submit" class="col-md-2 btn btn-primary">Lưu</button>
                              </div>
                            </form>  
                            
                        </div>
                        
                      </div>
              </li>
              <li class="list-group-item"> 
                        <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          <i class="fa fa-building" style="font-size:30px;color:red"></i> Ngoại thành
                        </a>
                      <div id="collapseTwo" class="collapse show">
                        <form class="form-inline">
                          <div class="col-md-6">
                            <span> Phí giao hàng </span>
                            <input type="number" class="form-control" id="feeshipngoaithanh" placeholder="Nhập phí giao hàng">
                          </div>
                          <div class="col-md-6" style="margin-top: 15px;">
                            <button type="submit" class="col-md-2 btn btn-danger">Sửa</button>
                            <button type="submit" class="col-md-2 btn btn-primary">Lưu</button>
                          </div>
                        </form>
                      </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
@endsection