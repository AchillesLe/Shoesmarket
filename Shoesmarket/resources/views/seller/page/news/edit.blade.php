@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
    <form class="form-inline" action="{{ route('postAddNews') }}" method="POST">
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="card-header">Sửa tin đăng</div>
        <div class="col-md-12 card-body">
          <div class="card-header">Sửa giá sản phẩm</div>
          <div class="card-body">
            <!--<div class="form-group{{ $errors->has('txtNameProduct') ? ' has-error' : '' }}" style="margin-bottom: 15px">
              <label for="txtNameProduct" class="col-md-3">Tên sản phẩm</label>

              <div class="col-md-7">
                <input id="txtNameProduct" type="text" class="col-md-12 form-control" name="txtNameProduct" value="{{ old('txtNameProduct') }}" required autofocus>

                @if ($errors->has('txtNameProduct'))
                  <span class="help-block">
                    <strong>{{ $errors->first('txtNameProduct') }}</strong>
                  </span>
                @endif
              </div>
            </div>-->
            <div class="form-group{{ $errors->has('txtOldPrice') ? ' has-error' : '' }}" style="margin-bottom: 15px">
              <label for="txtOldPrice" class="col-md-3">Gía cũ</label>

              <div class="col-md-7">
                <input id="txtOldPrice" type="number" class="col-md-12 form-control" name="txtOldPrice" value="{!! $product->price !!}" disabled>

                @if ($errors->has('txtOldPrice'))
                  <span class="help-block">
                    <strong>{{ $errors->first('txtOldPrice') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('txtNewPrice') ? ' has-error' : '' }}" style="margin-bottom: 15px">
              <label for="txtNewPrice" class="col-md-3">Gía mới</label>

              <div class="col-md-7">
                <input id="txtNewPrice" type="number" class="col-md-12 form-control" name="txtNewPrice" value="{{ old('txtNewPrice') }}" required autofocus>

                @if ($errors->has('txtNewPrice'))
                  <span class="help-block">
                    <strong>{{ $errors->first('txtNewPrice') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>
          <div class="card-header">Nội dung tin đăng</div>
          <div class="card-body">
            <div style="margin-bottom: 15px">
                  <textarea class="col-md-7" rows="7" cols="100" name="txtNoiDungTin">{!! $news->note !!}</textarea>
            </div>       
          </div>
          <div class="col-md-4">
              <button type="submit" class="btn btn-primary"> Sửa tin </button>
          </div>
        </div> 

      </div>   
    </div>
    
    </form>
      
@endsection