@extends('admin.master')
@section('content')
                    @if(count($errors)>0)
                        <div class="alert alert-danger" id="noti">
                            @foreach($errors->all() as $err)
                               {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                   @if(session('thongbao'))
                    <div  class="alert   @if(strpos(session('thongbao'), 'thành công') !== false) {{"alert-success"}} @else {{"alert-danger"}} @endif" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
  <div class="card mb-3">
    <div class="card">
      <h3 class="card-header">Phiếu phạt người bán</h3>
      <div class="card-block" style="padding: 10px;">
          <form action="" method="POST" accept-charset="utf-8"> 
            {{  csrf_field() }}
            <div class="form-group row">
            <label for="employeesName" class="col-2 col-form-label">Người Lập phiếu</label>
            <div class="col-9">
              <input class="form-control" type="text" value="{{Auth::guard('admin')->user()->name}}" name="employeesName" id="employeesName" readonly>
            </div>
          </div>
          <input class="form-control" type="text" value="{{$seller->id}}" name="idseller"  hidden>
          <div class="form-group row">
            <label for="sellername" class="col-2 col-form-label">Tên người bán</label>
            <div class="col-9">
              <input class="form-control" type="text" value="{{$seller->name}}" name="nameseller" id="sellername" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="money" class="col-2 col-form-label">Số tiền nộp phạt</label>
            <div class="col-9">
              <input class="form-control" type="number" value="0" min="0" max="100000000" name="money" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="reason" class="col-2 col-form-label">Lý do</label>
            <div class="col-9">
              <textarea class="form-control" name="reason" required></textarea> 
            </div>
          </div>
          <div class="col-md-12" align="center">
            <input type="submit" class="btn btn-primary" name="addpenalize" value="Lưu phiếu">
          </div>
          <div class="col-md-12">
            <a href="{{route('admin.listseller')}}" class="btn btn-primary">Quay Lại</a>
          </div>
          </form>
      </div>
    </div>
  </div>
@endsection