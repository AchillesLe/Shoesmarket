@extends('admin.master')
@section('content')
<script type="text/javascript"  src="sourceAdmin/ckeditor/ckeditor.js"></script>
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          mail
        </li>
        <li class="breadcrumb-item active">Danh sách mail mẫu</li>
	</ol>
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
                    
	<div class="card mb-3">
		<p style="width: 150px;margin-bottom: 10px;">
		<button class="btn btn-outline-info yess" type="button" data-toggle="modal" data-target="#mailtemplateinfo">
		    Thêm mail mẫu
		</button>
		</p>
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Danh sách mail mẫu</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered mailtemplatetable" id="dataTable" width="100%" cellspacing="0">
              <thead>
                @php($number = 0)
                <tr>
                  <th>#</th>
                  <th>Tiêu đề</th>
                  <th>Nội dung</th>
                  <th class="action">Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($list as $mail)
	              	<tr>
	                  <td width="80px;" data-id="{{$mail->id}}">{{++$number}}</td>
	                  <td width="130px;">{{$mail->title}}</td>
                      <td width="130px;" >{{$mail->content}}</td>
	                  <td >
	                  	<button class="btn btn-outline-primary" id="sua" data-toggle="modal" data-target="#mailtemplateinfo">Sửa</button></a>
	                  	<a href="{{url('admin/mail/mailtemplate/delete',[$mail->id])}}"><button class="btn btn-outline-danger" name="delete"  id="delete" >Xoá</button><a>
	                  	</td>
	                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} mail mẫu</div>
      </div>
<div class="modal fade" id="mailtemplateinfo" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Thông tin mail mẫu</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="padding: 20px;">
          <div class="card card-block">
		  	<div  style="width: 80%;margin: 20px;">
			    <form action="{{url('admin/mail/updatemailTemplate')}}" method="POST" accept-charset="utf-8">
			    	{{csrf_field()}}
			    	<div class="form-group">
				    	<input class="form-control" type="text" id="id" name="id" hidden >
			    	</div>
			    	<div class="form-group">
				    	<label for="name">Tiêu đề</label>
				    	<input class="form-control" type="text" id="title" name="title">
			    	</div>
            	<div class="form-group" >
	          		<label for="content" class="col-md-3">Nội dung</label>
					<textarea id="content" name="content" class="ckeditor"></textarea>
	          	</div>
					<input class="btn btn-outline-primary" type="submit" name="add" id="add" value="Thêm">
					<input class="btn btn-outline-primary" type="submit" name="edit" id="edit" value="Sửa" style="display: none">
			    </form>
		    </div>
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
          // $(function() {
            //     $('#content').ckeditor({
            //         toolbar: 'Full',
            //         enterMode : CKEDITOR.ENTER_BR,
            //         shiftEnterMode: CKEDITOR.ENTER_P
            //     });
            // });
      		 $(".mailtemplatetable").on('click','#sua',function(){
      		 	var row=$(this).closest("tr"); 
      		 	var id = row.find("td:eq(0)").data('id');
      		 	var title = row.find("td:eq(1)").text();
      		 	var content = row.find("td:eq(2)").text();
      		 	$('#mailtemplateinfo').addClass('show');
      		 	$('#mailtemplateinfo').css('display','block');
      		 	$('input[name=title]').val(title);

            	CKEDITOR.instances.content.setData( content );		
          			$('input[name=id]').val(id);
          			$('input[name=edit]').show();
          			$('input[name=add]').hide();
                $('#noti').hide();
          	});
            $('button.yess').click(function(event) {
                $('#noti').hide();
                $('input[name=title]').val("");
                CKEDITOR.instances.content.setData("");		
          		$('input[name=id]').val("");
          		$('input[name=add]').show();
          		$('input[name=edit]').hide();
            });
      	});
      </script>
@endsection