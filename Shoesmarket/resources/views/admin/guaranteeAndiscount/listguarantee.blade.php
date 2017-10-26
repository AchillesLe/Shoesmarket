@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Cài đặt
        </li>
        <li class="breadcrumb-item active">Danh mục bảo hành</li>
	</ol>
	<div class="card mb-3">
		<p style="width: 150px;margin-bottom: 10px;">
		<button class="btn btn-success yess" type="button" data-toggle="collapse" data-target="#Formaddtype" aria-expanded="false" aria-controls="Formaddtype"  >
		    Thêm Danh mục
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
		<div class="collapse" id="Formaddtype">
		  <div class="card card-block">
		  	<div  style="width: 80%;margin: 20px;">
			    <form action="{{url('admin/guarantee/update')}}" method="POST" accept-charset="utf-8" id="formadd">
			    	{{csrf_field()}}
			    	<div class="form-group">
				    	<label for="name" hidden>Mã Loại :</label>
				    	<input class="form-control" type="text" id="id" name="id" hidden >
			    	</div>
			    	<div class="form-group">
				    	<label for="name">Tên :</label>
				    	<input class="form-control" type="text" id="name" name="name">
			    	</div>
            <div class="form-group">
              <label for="name">Số lượng tháng</label>
              <input class="form-control" type="number" min="1" max="999" name="value" />
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
          <i class="fa fa-table"></i>danh sách danh mục bảo hành</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered mytable" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mã bảo hành</th>
                  <th>Tên</th>
                  <th>Số lượng tháng</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($list as $guarantee)
	              	<tr >
	                  <td width="80px;">{{$guarantee->id}}</td>
	                  <td width="130px;">{{$guarantee->name}}</td>
                    <td width="130px;">{{$guarantee->value}}</td>
	                  <td width="150px">
	                  	<button class="btn btn-info" name="Edit"  id="edit">sửa</button></a>
	                  	<a href="{{url('admin/guarantee/delete',[$guarantee->id])}}"><button class="btn btn-danger" name="delete"  id="delete" >xoá</button><a>
	                  	</td>
	                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} danh mục bảo hành</div>
      </div>
      <script >
      	$(document).ready(function(){
      		 $(".mytable").on('click','#edit',function(){
      		 	var row=$(this).closest("tr"); 
      		 	var id = row.find("td:eq(0)").text();
      		 	var name = row.find("td:eq(1)").text();
      		 	var value = row.find("td:eq(2)").text();
      		 	$('input[name=name]').val(name);
            $('input[name=value]').val(value);
      			$('input[name=id]').val(id);
      			$('#Formaddtype').addClass('show');
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