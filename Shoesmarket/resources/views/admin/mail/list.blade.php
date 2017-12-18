@extends('admin.master')
@section('content')
<script type="text/javascript" language="javascript" src="sourceAdmin/ckeditor/ckeditor.js"></script>

	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          email
        </li>
        <li class="breadcrumb-item active">danh sách email</li>
	</ol>
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
        <div class="card-header">
          <i class="fa fa-table"></i> danh sách email đã gửi</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered tablemail" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Người nhận</th>
                  <th>Tiêu đề</th>
                  <th>Ngày gửi</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@php($number = 0)
              	 @foreach($list as $item) 
	              	<tr data-namefrom="{{$item->nameFrom}}" data-mailfrom="{{$item->mailFrom}}" data-mailto="{{$item->mailTo}}" data-content="{{$item->content}}" data-title="{{$item->title}}" data-created_at="{{$item->created_at}}" data-nameto="{{$item->nameTo}}">
	              	  <td >{{++$number}}</td>
	                  <td >{{$item->nameTo}}</td>
	                  <td >{{$item->title}}</td>
	                  <td >{{$item->created_at}}</td>
	                  <td >
						<button class="btn btn-outline-primary" id="view"  type="button"  data-toggle="modal" data-target="#mailinfo" >Xem chi tiết</button>
	                  </td>
	                </tr>
                 @endforeach 
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Tổng cộng {{count($list)}} email</div>
  	</div>

	<div class="modal fade " id="mailinfo" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content" style="width: 1000px;margin-left: -87px">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Thông tin email gửi</h5>
		        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
	      	<div class="modal-body">
		        <div style="padding: 10px; " class="mailmodal">
		        	<div class="form-inline">
		          		<label for="mailFrom" class="col-md-3">Địa chỉ gửi</label>
		          		<input class="form-control col-md-9" type="text" id="mailfrom" readonly>
		          	</div>
		        	<div class="form-inline">
		          		<label for="nameFrom" class="col-md-3">Người Gửi</label>
		          		<input class="form-control col-md-9" type="text" id="namefrom" readonly>
		          	</div>
		          	
		          	<div class="form-inline">
		          		<label for="mailTo" class="col-md-3">Email To</label>
		          		<input class="form-control col-md-9" type="text" id="mailto"  readonly>
		          	</div>

		          	<div class="form-inline">
		          		<label for="nameTo" class="col-md-3">Người Nhận</label>
		          		<input class="form-control col-md-9" type="text" id="nameto"  readonly>
		          	</div>
		          	<div class="form-inline">
		          		<label for="title" class="col-md-3">Tiêu đề</label>
		          		<input class="form-control col-md-9" type="text" id="title"  readonly>
		          	</div>
		          	<div class="form-inline">
		          		<label for="content" class="col-md-3">Nội dung</label>
						<textarea id="content" class="ckeditor" readonly disabled></textarea>
		          	</div>
		        </div>
	      <div class="modal-footer">
	        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
	      </div>
	     </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
		$(".tablemail").on('click','#view',function(){
      		 	var row=$(this).closest("tr"); 
      		 	var namefrom = row.data('namefrom');
      		 	var mailfrom = row.data('mailfrom');
      		 	var nameto = row.data('nameto');
      		 	var mailto = row.data('mailto');
      		 	var title = row.data('title');
      		 	var content = row.data('content');
      		 	var created_at = row.find("td:eq(0)").data('created_at');
      		 	$('#mailinfo').addClass('show');
      		 	$('#mailinfo').css('display','block');
				$('input[id=mailfrom]').val(mailfrom);
				$('input[id=namefrom]').val(namefrom);
				$('input[id=mailto]').val(mailto);
				$('input[id=nameto]').val(nameto);
				$('input[id=title]').val(title);
            	CKEDITOR.instances.content.setData( content );		
      			// $('input[name=id]').val(id);
      			// $('input[name=edit]').show();
      			// $('input[name=add]').hide();

                $('#noti').hide();
          	});
            $('button.yess').click(function(event) {
                $('#noti').hide();
                $('input[name=title]').val("");
                CKEDITOR.instances.content.setData("");		
                $('#mailinfo').addClass('show');
      		 	$('#mailinfo').css('display','block');
				$('input[id=mailFrom]').val('');
				$('input[id=nameFrom]').val('');
				$('input[id=mailTo]').val('');
				$('input[id=nameTo]').val('');
				$('input[id=title]').val('');
          		// $('input[name=id]').val("");
          		// $('input[name=add]').show();
          		// $('input[name=edit]').hide();
            });
	</script>
@endsection