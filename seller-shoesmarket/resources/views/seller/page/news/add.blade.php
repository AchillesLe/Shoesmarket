@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
    <form class="form-inline" action="{!! route('postAddNews') !!}" method="post" name="frmAddNews">
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="card-header card bg-primary text-white"> 
            <button type="button" class="col-md-3 btn btn-warning">
              Số tin đăng còn lại: <span class="badge badge-light">{!! $quantity_news->newsquantity !!}</span>
            </button>
        </div>
      <div class="col-md-12 card-body">
        <div class="card-header card bg-primary text-white">Thông tin sản phẩm</div>
        <div class="card-body">
            <div class="col-md-7 input-group">
              <span class="input-group-addon">Tên sản phẩm</span>
              <input id="msg" type="text" class="form-control" name="txtTenSanPham" placeholder="Tên sản phẩm">
            </div>
            <div class="col-md-6 input-group">
              <span class="input-group-addon">Loại sản phẩm</span>
              <select class="form-control" id="sel1" name="cbLoaiSP">
                <option value="0">Phân loại sản phẩm</option>
                @foreach($list_typeProduct as $type)
                <option value="{!! $type->id !!}">{!! $type->name !!}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12 input-group">
              <label class="col-md-6 radio-inline"><input type="radio" name="optradio"> Nam </label>
              <label class="col-md-6 radio-inline"><input type="radio" name="optradio"> Nữ </label>
            </div>
        </div>
          <div class="col-md-12 card-header card bg-primary text-white">Tùy chọn kho hàng</div>
          <div class="card-body">
          
          <div class="col-md-12 form-group khohang" id="khohang">
            <div class="col-md-12 form-group linekhohang" style="margin-bottom: 10px">
              <div class="col-md-3">
                <span>Kích cỡ</span>
                <input type="text" class="form-control" name="sizeProduct[]" placeholder="Kích cỡ">
              </div>
              <div class="col-md-3">
                <span>Số Lượng </span>
                <input type="number" class="form-control" name="quantityProduct[]" placeholder="Số lượng">
              </div>
              <div class="col-md-3">
                <span>Màu Sắc </span>
                <input type="number" class="form-control" name="colorProduct[]" placeholder="Màu sắc">
              </div>
              <!--<a id="removeKhohang">Xóa dòng</a>-->
            </div>
          </div>
          <a id="insertKhohang">Thêm kho hàng</a>

          </div>
        </div> 

      </div>
       <div class="col-md-12 noidungtin" style="margin-top: 25px;">  
            <textarea name="txtNoiDung" class="ckeditor"></textarea>
      </div>
      <center>
        <button type="submit" class="col-md-4 btn btn-primary" style="float: left; margin-top: 15px; margin-bottom: 15px; margin-left: 200px"> Đăng tin </button>
      </center>
    </div>
    
    </form>
      
@endsection