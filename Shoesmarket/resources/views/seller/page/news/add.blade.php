@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
  @if($seller->isblock == 1)
  <h2>Tài khoản đã bị khóa, không thể truy cập</h2>
  @else
  <form class="form-inline" action="{{ route('postAddNews') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="card-header">
            Đăng tin bán sản phẩm 
            <div class="col-md-3 btn btn-warning" style="float: right">
              Số tin đăng còn lại: <span class="badge badge-light">{!! $quantity_news->newsquantity !!}</span>
            </div>
        </div>
      <div class="col-md-12 card-body">
        <div class="card-header">Thông tin sản phẩm</div>
        <div class="card-body">

            <div class="form-group{{ $errors->has('txtNameProduct') ? ' has-error' : '' }}" style="margin-bottom: 15px">
              <label for="txtNameProduct" class="col-md-3">Tên sản phẩm</label>

              <div class="col-md-7">
                <input id="txtNameProduct" type="text" class="col-md-12 form-control" name="txtNameProduct" value="{{ old('txtNameProduct') }}" required autofocus>

                @if ($errors->has('txtNameProduct'))
                  <span class="help-block">
                    <strong>{{ $errors->first('txtNameProduct') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('cbLoaiSP') ? ' has-error' : '' }}" style="margin-bottom: 15px">
              <label for="cbLoaiSP" class="col-md-3">Loại sản phẩm</label>
              <div class="col-md-7">
                <select class="form-control" id="cbLoaiSP" name="cbLoaiSP">
                  <option value="0">Phân loại sản phẩm</option>
                  @foreach($list_typeProduct as $type)
                  <option value="{!! $type->id !!}">{!! $type->name !!}</option>
                  @endforeach
                </select>
                @if ($errors->has('cbLoaiSP'))
                  <span class="help-block">
                    <strong>{{ $errors->first('cbLoaiSP') }}</strong>
                  </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('optradioSexProduct') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                <label for="optradioSexProduct" class="col-md-3 control-label">Giới tính</label>
                <div class="col-md-7 input-group">
                    <label for="optradioSexProduct" class="col-md-2 radio-inline"><input type="radio" name="optradioSexProduct" value="1"> Nam </label>
                    <label for="optradioSexProduct" class="col-md-2 radio-inline"><input type="radio" name="optradioSexProduct" value="2"> Nữ </label>
                    <label for="optradioSexProduct" class="col-md-2 radio-inline"><input type="radio" name="optradioSexProduct" value="3"> Cả 2 </label>
                </div>
                @if ($errors->has('optradioSexProduct'))
                    <span class="help-block">
                      <strong>{{ $errors->first('optradioSexProduct') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('txtPriceProduct') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                <label for="txtPriceProduct" class="col-md-3">Giá sản phẩm</label>

                <div class="col-md-7">
                  <input id="txtPriceProduct" type="number" class="col-md-12 form-control" name="txtPriceProduct" value="{{ old('txtPriceProduct') }}" required autofocus>

                  @if ($errors->has('txtPriceProduct'))
                    <span class="help-block">
                      <strong>{{ $errors->first('txtPriceProduct') }}</strong>
                    </span>
                  @endif
                </div>
            </div>

           <div class="form-group{{ $errors->has('imgProduct') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                <label for="imgProduct" class="col-md-3">Hình ảnh</label>
                <div class="col-md-7">
                  <input type="file" name="imgProduct" />
                  @if ($errors->has('imgProduct'))
                    <span class="help-block">
                      <strong>{{ $errors->first('imgProduct') }}</strong>
                    </span>
                  @endif
                </div>
          </div>


        </div>
          <div class="card-header">Thông tin kho hàng</div>
          <div class="card-body">
          
          <div class="col-md-12 form-group khohang" id="khohang">
            <div class="col-md-12 form-group linekhohang" style="margin-bottom: 10px">
              <div class="col-md-3">
                <span>Kích cỡ </span>
                <input type="text" class="form-control" name="sizeProduct[]" placeholder="Kích cỡ" required autofocus>
              </div>
              <div class="col-md-3">
                <span>Số Lượng </span>
                <input type="number" class="form-control" name="quantityProduct[]" placeholder="Số lượng" required autofocus>
              </div>
              <div class="col-md-3">
                <span>Màu Sắc </span>
                <input type="text" class="form-control" name="colorProduct[]" placeholder="Màu sắc" required autofocus>
              </div>
              <!--<a id="removeKhohang">Xóa dòng</a>-->
            </div>
          </div>
          <a id="addKhohang" class="btn btn-success text-white">Thêm kho hàng</a>

          </div>
          <div class="card-header">Bản tin</div>
          <div class="card-body">

            <div class="form-group{{ $errors->has('txtNameNews') ? ' has-error' : '' }}" style="margin-bottom: 15px">
              <span class="col-md-2">Tiêu đề bản tin </span>
              <!--<label for="txtNameNews" class="col-md-3">Tiêu đề bản tin</label>-->
                <input id="txtNameNews" type="text" class="col-md-5 form-control" name="txtNameNews" value="{{ old('txtNameNews') }}" required autofocus>

                @if ($errors->has('txtNameNews'))
                  <span class="help-block">
                    <strong>{{ $errors->first('txtNameNews') }}</strong>
                  </span>
                @endif
            </div>

            <div class="col-md-12" style="margin-bottom: 15px">
              <span class="col-md-2" style="float: left">Nội dung</span>
              <!--<label for="txtNoiDung" class="col-md-3">Nội dung bản tin</label>-->
              <textarea class="col-md-7" rows="7" cols="100" name="txtNoiDung"></textarea>
            </div>       
          </div>
          <div class="col-md-4">
              <button type="submit" class="btn btn-primary"> Đăng tin </button>
          </div>
        </div> 
        
      </div>
      
    </div>
    
  </form>
  @endif
@endsection