@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
  @if($seller->isblock == 1)
  <h2>Tài khoản đã bị khóa, không thể truy cập</h2>
  @else

  <form class="form-inline" action="{!! route('postSettingShipfee') !!}" method="POST">
  {{ csrf_field() }} 
      <div class="col-md-12 feeshipconfig">
        <div class="card col-md-12">

          <div class="card-header card bg-primary text-white">Cài đặt phí giao hàng</div>
          <div class="card-body">
            <ul class="list-group">
              <div class="alert alert-info">Lưu ý : Những quận/huyện không được cài đặt phí ship thì sẽ mặc định là 0 VNĐ .</div>
              <li class="list-group-item"> 

                        <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          <i class="fa fa-cube"></i> Cài đặt phí giao hàng
                        </a>
                      <div id="collapseOne" class="collapse show">
                        <div class="col-md-12">
                          
                          <div class="form-group{{ $errors->has('cbCountyShipfee') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                            <label for="cbCountyShipfee" class="col-md-3">Quận/huyện</label>
                            <div class="col-md-7">
                              <select class="form-control" id="cbCountyShipfee" name="cbCountyShipfee">
                                <option value="0">Chọn quận huyện</option>
                                @foreach($listcounty as $county)
                                <option value="{!! $county->id !!}">{!! $county->name !!}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('cbCountyShipfee'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('cbCountyShipfee') }}</strong>
                                </span>
                              @endif
                            </div>
                          </div>

                          <div class="form-group{{ $errors->has('txtShipfee') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                              <label for="txtShipfee" class="col-md-3">Phí giao hàng</label>

                              <div class="col-md-7">
                                <input id="txtShipfee" type="number" class="col-md-12 form-control" name="txtShipfee" value="{{ old('txtShipfee') }}" required autofocus>

                                @if ($errors->has('txtShipfee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('txtShipfee') }}</strong>
                                  </span>
                                @endif
                              </div>
                          </div>
                          
                          <div class="col-md-4">
                              <button type="submit" class="col-md-4 btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu </button>
                          </div>
                            
                        </div>
                        
                      </div>
              </li>
            </ul>
            <div class="card-header"><i class="fa fa-list"></i> Danh sách phí giao hàng</div>
            <div class="card-body">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Quận huyện</th>
                        <th>Phí ship</th>
                        <!--<th>Mô tả</th>-->
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($listshipfee as $shipfee)
                     <?php $countyobj=App\County::findOrFail($shipfee->idCounty); ?>
                      <tr>
                        <td>{!! $countyobj->name !!}</td>
                        <td>{!! $shipfee->shipfee !!}</td> 
                        <td style="text-align: center">
                          <a href="{!! route('deleteShipfee',$shipfee->id) !!}" class="btn btn-danger text-white">Xóa</a>
                          <!--<button type="submit" class="btn btn-success">Ân/Hiện</button>-->
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    @endif
@endsection