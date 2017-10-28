@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Cài đặt
        </li>
        <li class="breadcrumb-item active">danh sách gói tin</li>
	</ol>
	<div class="card mb-3">
		<p style="width: 150px;margin-bottom: 10px;">
		<button class="btn btn-success yess" type="button" data-toggle="collapse" data-target="#Formaddpackage" aria-expanded="false" aria-controls="Formaddpackage"  >
		    Thêm gói tin
		</button>
		</p>
					         @if(count($errors)>0)
                        <div class="alert alert-danger" id="noti">
                            @foreach($errors->all() as $err)
                               {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div  class="alert alert-success" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif
		<div class="collapse" id="Formaddpackage">
		  <div class="card card-block">
		  	<div  style="width: 80%;margin: 20px;">
			    <form action="{{url('admin/package/update')}}" method="POST" accept-charset="utf-8" id="formadd">
			    	{{csrf_field()}}
			    	<div class="form-group">
				    	<input class="form-control" type="text" id="id" name="id" hidden >
			    	</div>
			    	<div class="form-group">
				    	<label for="name">Tên </label>
				    	<input class="form-control" type="text" id="name" name="name">
			    	</div>
            <div class="form-group">
              <label for="quantity">Số lượng tin </label>
              <input class="form-control" type="number" id="quantity" name="quantity">
            </div>
			    	<div class="form-group">
				    	<label for="money" >Số tiền trọn gói</label>
				    	<input  class="form-control" type="text" name="money" id="money" pattern="[0-9]+(\.[0-9]{0,2})?" title="Số tiền phải là một số . ví dụ : 150000">
			    	</div>
					<input class="btn btn-primary" type="submit" name="add" id="add" value="Thêm">
					<input class="btn btn-primary" type="submit" name="edit" id="edit" value="Sửa" style="display: none">
			    </form>
		    </div>
		  </div>
		</div>
	</div>
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>danh sách gói tin</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered mytable" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã gói tin</th>
                  <th>Tên</th>
                  <th>Số lượng tin</th>
                  <th>Số tiền trọn gói</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($list as $package)
	              	<tr>
	                  <td width="80px;">{{$package->id}}</td>
	                  <td width="130px;">{{$package->name}}</td>
                    <td width="130px;" >{{$package->newquantity}}</td>
	                  <td >{{$package->money}}</td>
	                  <td width="150px">
	                  	<button class="btn btn-info" name="Edit"  id="edit">Sửa</button></a>
	                  	<a href="{{url('admin/package/delete',[$package->id])}}"><button class="btn btn-danger" name="delete"  id="delete" >Xoá</button><a>
	                  	</td>
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
            var quantity = row.find("td:eq(2)").text();
      		 	var money = row.find("td:eq(3)").text();
      		 	$('input[name=name]').val(name);
            $('input[name=quantity]').val(quantity);
            $('input[name=money]').val(money);
      			$('input[name=id]').val(id);
      			$('#Formaddpackage').addClass('show');
      			$('input[name=name]').focus();
      			$('input[name=edit]').show();
      			$('input[name=add]').hide();
            $('button.yess').text('Sửa danh mục');
            $('#noti').hide();
      		 });
           $('button.yess').click(function(event) {
            $('#noti').hide();
           });
      	});
      </script>
@endsection