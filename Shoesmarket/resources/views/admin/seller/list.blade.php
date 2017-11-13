@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Nhóm người bán hàng
        </li>
        <li class="breadcrumb-item active">danh sách người bán</li>
	</ol>

	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>danh sách người bán</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered listsellertable" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã số</th>
                  <th>Tên</th>
                  <th>Số đt</th>
                  <th>Email</th>
                  <th>Số tin</th>
                  <th>Trạng thái</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              	@foreach($list as $seller)
	              	<tr data-address="{{$seller->address}}" data-identification="{{$seller->identification}}" data-created="{{$seller->created_at}}" data-updated="{{$seller->updated_at}}" data-reason="{{$seller->reason}}" data-status="{{$seller->isblock}}">
	                  <td width="80px;">{{$seller->idseller}}</td>
	                  <td width="130px;">{{$seller->name}}</td>
                    <td width="130px;" >{{$seller->phone}}</td>
                    <td width="130px;" >{{$seller->email}}</td>
	                  <td >{{$seller->newsquantity}}</td>
                    <td width="105px"> 
                          <p id="statusActive" @if($seller->isblock =='1') {{"hidden"}} @endif><i class="fa fa-fw  fa-check-circle" style="color:#4CAF50" value="1"></i><b>Kích hoạt</b></p>
                          <p id="statusblock" @if($seller->isblock =='0') {{"hidden"}} @endif><i class="fa fa-fw fa-minus-circle" style="color:#ff1a1a" value="0"></i><b>Đang khoá</b></p>
                    <td>
                      {{-- <a href="{!!url('admin/seller/updatestatus',$seller->idseller)!!}"><button class="btn btn-danger" name="block" id="status"  @if($seller->isblock=='1') {{"hidden"}} @endif>Khoá</button></a>
                      <a href="{!!url('admin/seller/updatestatus',$seller->idseller)!!}"><button class="btn btn-success" name="active" id="status" @if($seller->isblock=='0') {{"hidden"}} @endif>Mở khoá</button></a>
                      <button class="btn btn-info" id="view"  type="button"  data-toggle="modal" data-target="#sellerinfo" >Xem</button> --}}
                      <div class="btn-group groupaction" role="group">
                          <button data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle" data-original-title="" title="Action">
                            Hành động 
                            <span class="caret">
                            </span>
                          </button>
                          <ul class="dropdown-menu" style="min-width: 120px!important">
                            <li >
                                <a href="{!!url('admin/seller/updatestatus',$seller->idseller)!!}"><button class="btn btn-outline-danger" name="block" id="status"  @if($seller->isblock=='1') {{"hidden"}} @endif>Khoá</button></a>
                                <a href="{!!url('admin/seller/updatestatus',$seller->idseller)!!}"><button class="btn btn-outline-info" name="active" id="status" @if($seller->isblock=='0') {{"hidden"}} @endif>Mở khoá</button></a>
                            </li>
                            <li >
                              <button class="btn btn-outline-info" id="view"  type="button"  data-toggle="modal" data-target="#sellerinfo" >Xem</button>
                            </li>
                            <li >
                              <a href="{!!url('admin/seller/sellpackage')!!}"><button class="btn btn-outline-info" name="addpackage" >Nạp tin</button></a>
                            </li>
                            <li >
                              <a href="{!!url('admin/mail/create',$seller->idseller)!!}"><button class="btn btn-outline-info" name="addmail" >Gửi mail</button></a>
                            </li>
                          </ul>
                      </div>
	                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} người bán</div>
      </div>


<div class="modal fade" id="sellerinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin của người bán</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="padding: 20px;">
          <div class="form-group" hidden id="image">
                  <label for="image">Ảnh</label>
                  <input class="form-control" type="file" name="image"  readonly>
          </div>
          <div class="form-group">
                  <label for="name">Tên </label>
                  <input class="form-control" type="text" name="name" readonly >
          </div>
          <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input class="form-control" type="number" name="phone" readonly>
          </div>
          <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" readonly>
          </div>
          <div class="form-group">
                  <label for="address">Địa chỉ</label>
                  <input class="form-control" type="text" name="address" readonly>
          </div>
          <div class="form-group">
                  <label for="indenti">Chứng minh thư nhân dân</label>
                  <input class="form-control" type="number" name="indenti" readonly>
          </div>
          <div class="form-group">
                  <label for="quantity">Số lượng tin dư</label>
                  <input class="form-control" type="number" name="quantity" readonly>
          </div>
          <div class="form-group">
                  <label for="status">Trạng thái</label>
                  <input class="form-control" type="text" name="status" readonly>
          </div>
          <div class="form-group" hidden id="reason">
                  <label for="reason">Lí do </label>
                  <textarea class="form-control" name="reason"  readonly></textarea>
          </div>
          <div class="form-group">
                  <label for="created_at">Ngày Tạo </label>
                  <input class="form-control" type="text" name="created_at" readonly>
          </div>
          <div class="form-group">
                  <label for="updated_at">Ngày cập nhật mới nhất </label>
                  <input class="form-control" type="text" name="updated_at" readonly>
          </div>
        </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
      </div>
      </div>
    </div>
  </div>
</div>
      <script >
      	$(document).ready(function(){

      		$(".listsellertable").on('click','#view',function(){
      		 	var row=$(this).closest("tr"); 
      		 	var id = row.find("td:eq(0)").text();
      		 	var name = row.find("td:eq(1)").text();
            var phone = row.find("td:eq(2)").text();
            var email = row.find("td:eq(3)").text();
            var quantity = row.find("td:eq(4)").text();
            var address = row.data("address");
            var identification = row.data("identification");
            var reason = row.data("reason");
            var status = row.data("status");
            var create_at = row.data("created");
            var update_at = row.data("updated");
      		 	$('input[name=name]').val(name);
            $('input[name=phone]').val(phone);
            $('input[name=email]').val(email);
            $('input[name=quantity]').val(quantity);
            $('input[name=address]').val(address);
            $('input[name=indenti]').val(identification);
            if(status=="1")
              $('input[name=status]').val("Đang khoá");
            else
              $('input[name=status]').val("Đang hoạt động");
            if(reason)
            {
              $('#reason').removeAttr("hidden"); 
              $('textarea[name=reason]').val(reason);
            }
            $('input[name=created_at]').val(create_at);
            $('input[name=updated_at]').val(update_at);
      		 });

        });
      </script>
@endsection