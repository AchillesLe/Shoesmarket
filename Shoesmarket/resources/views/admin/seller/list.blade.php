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
            <table class="table table-bordered mytable" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã số</th>
                  <th>Tên</th>
                  <th>Số đt</th>
                  <th>email</th>
                  <th>Số tin</th>
                  <th>Vip</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($list as $seller)
	              	<tr>
	                  <td width="80px;">{{$seller->idseller}}</td>
	                  <td width="130px;">{{$seller->name}}</td>
                    <td width="130px;" >{{$seller->phone}}</td>
                    <td width="130px;" >{{$seller->email}}</td>
	                  <td >{{$seller->newsquantity}}</td>
                    <td >{{$seller->IsVip}}</td>
                    <td > @if($seller->isblock =='0')
                          <i id="status" class="fa fa-fw  fa-minus-circle" style="color:#ff3333;"></i></a><b>Khoá</b>
                        @elseif(($seller->isblock=='1'))
                          <i id="status" class="fa fa-fw  fa-check-circle" style="color:#4CAF50;"></i></a><b>kích hoạt</b>
                        @endif</td>
	                  <td width="150px">
	                  	<button class="btn btn-info" name="Edit"  id="edit">Chi tiết</button></a>
	                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} loại</div>
      </div>
      <script >
      	$(document).ready(function(){
      		 $(".mytable").on('click','#edit',function(){
      		 	var row=$(this).closest("tr"); 
      		 	var id = row.find("td:eq(0)").text();
      		 	var name = row.find("td:eq(1)").text();
            var phone = row.find("td:eq(2)").text();
            var email = row.find("td:eq(3)").text();
            var quantity = row.find("td:eq(4)").text();
      		 	$('input[name=name]').val(name);
            $('input[name=phone]').val(phone);
            $('input[name=email]').val(email);
      			$('input[name=id]').val(id);
            $('input[name=quantity]').val(quantity);
      			$('#Formaddseller').addClass('show');
      			$('input[name=name]').focus();
      			$('input[name=edit]').show();
      			$('input[name=add]').hide();
            $('button.yess').text('Sửa danh mục');
            $('#noti').hide();
      		 });

           $('button.yess').click(function(event) {
            $('#noti').hide();
           });

           $('#status').click(function(event) {
            var row=$(this).closest("tr"); 
            var id = row.find("td:eq(0)").text();
            
             $.ajax({
               url: '{!!url('admin/seller/updatestatus/')!!}'+ '/'+ id,
               type: 'GET',
               success:function(response)
               {
                  if(response==="1")
                  {
                    row.find("td:eq(6)").html('<i id="status" class="fa fa-fw  fa-check-circle" style="color:#4CAF50;"></i></a><b>kích hoạt</b>');
                    
                  }
                  else if(response==="0")
                  {
                    row.find("td:eq(6)").html('<i id="status" class="fa fa-fw  fa-minus-circle" style="color:#ff3333;"></i></a><b>Khoá</b>');
                  }

               }
             });
           });
      	});
      </script>
@endsection