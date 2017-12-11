@extends('Seller.master')
@section('content')
      <!-- Example DataTables Card-->
    <form>
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="card-header card bg-primary text-white"> 
            Sửa sản phẩm
        </div>
        <div class="card-body">
          <div class="col-md-12 ttsanpham">
            <div class="col-md-7 input-group">
              <span class="input-group-addon">Tên sản phẩm</span>
              <input id="msg" type="text" class="form-control" name="msg" placeholder="Tên sản phẩm">
            </div>
            <div class="col-md-6 input-group">
              <span class="input-group-addon">Gía cũ</span>
              <input id="priceProduct" type="number" class="form-control" name="priceOldProduct" placeholder="Gía sản phẩm">
            </div>
            <div class="col-md-6 input-group">
              <span class="input-group-addon">Gía mới</span>
              <input id="priceProduct" type="number" class="form-control" name="priceNewsProduct" placeholder="Gía sản phẩm">
            </div>
          </div>
          <div class="col-md-12 noidungtin" style="margin-top: 25px;">  
              <textarea name="txtNoiDung" class="ckeditor"></textarea>
          </div>
          <div class="col-md-12">
            <button type="submit" class="col-md-4 btn btn-primary" style="float: left; margin-top: 15px; margin-bottom: 15px;"> Sửa tin </button>
          </div>
        </div> 

      </div>   
    </div>
    
    </form>
      
@endsection