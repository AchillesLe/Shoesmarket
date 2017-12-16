@extends('Seller.master')
@section('content')
  
      <!-- Example DataTables Card-->
  <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('seller.paypal') !!}" >
    {{ csrf_field() }}
      <div class="card-header">
          <i class="fa fa-table"></i> Thanh Toán </div>
        <div class="card-body">
          <div class="table-responsive">

    @if($message =Session::get('success'))
      <div class=" alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>{{$message}}</strong>
      </div>
    @endif
    {!!Session::forget('success')!!}   
    @if($message =Session::get('error'))
      <div class=" alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>{{$message}}</strong>
      </div>
    @endif
    {!!Session::forget('error')!!} 
    <input type="text" class="form-control" name="id" value="{!! $package->id !!}" hidden> 
    {{-- <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><center>Gói tin</center></th>
                <th><center>Số lượng tin</center></th>
                <th><center>Giá</center></th>
            </tr>
        </thead>

        <tbody>


              <tr>
                  <td><input type="text" class="form-control" name="ten_goi_tin" value="{!! $package->name !!}" readonly></td>
                  <td><input type="number" class="form-control" name="so_luong" value="{!! $package->newquantity !!}" readonly></td>
                  <td><input type="number" class="form-control" name="tong_tien" value="{!! $package->money !!}" readonly></td>
              </tr>

        </tbody>
        
        <tfoot>
            <tr>
              <td></td>
              <td><button type="submit" class="btn btn-primary">
                                        Thanh toán với Paypal
                </button>
              </td>
              <td></td>
            </tr>
        </tfoot>
    </table> --}}
          <div class="form-group row">
            <label f class="col-sm-2 col-form-label"></label>
            <label for="ten_goi_tin" class="col-sm-2 col-form-label">Gói tin</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="ten_goi_tin" name="ten_goi_tin" value="{!! $package->name !!} "  readonly>
            </div>
          </div>
          <div class="form-group row">
            <label f class="col-sm-2 col-form-label"></label>
            <label for="cost" class="col-sm-2 col-form-label">Đơn giá</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="cost" name="cost" value="{!! $package->money !!}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label f class="col-sm-2 col-form-label"></label>
            <label for="sotin" class="col-sm-2 col-form-label">Số tin</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="sotin" name="sotin" value="{!! $package->newquantity !!}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label f class="col-sm-2 col-form-label"></label>
            <label for="so_luong" class="col-sm-2 col-form-label">Số lượng gói</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="so_luong" name="so_luong_goi" value="1" required>
            </div>
          </div>
          <div class="form-group row">
            <label f class="col-sm-2 col-form-label"></label>
            <label for="so_luong_tin" class="col-sm-2 col-form-label">Tổng số lượng tin</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="so_luong_tin" name="so_luong_tin" value="{!! $package->newquantity !!}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label f class="col-sm-2 col-form-label"></label>
            <label for="tong_tien" class="col-sm-2 col-form-label">Tổng tiền</label>
            <div class="col-sm-6">
              <input type="tong_tien" class="form-control" id="tong_tien" name="tong_tien"  value="{!! $package->money !!}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label f class="col-sm-2 col-form-label"></label>
            <label  class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6">
              <button type="submit" class="btn btn-primary">Thanh toán với Paypal</button>
            </div>
          </div>
        
      </div>
    </div>
</form>
<a href="{{route('getListOrder')}}"><button class="btn btn-primary">Quay lại</button></a>
<script type="text/javascript">
  $('#so_luong').change(function(event) {
    $sl = $(this).val();
    $cost = $('#cost').val();
    $tin = $('#sotin').val();
    $('#tong_tien').val($sl*$cost);
    $('#so_luong_tin').val($sl*$tin);
  });
</script>
@endsection