@extends('admin.master')
@section('content')

<script type="text/javascript"  src="sourceAdmin/ckeditor/ckeditor.js"></script>
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
	<div class="card card-block">
		<div class="card-header">
          <i class="fa fa-envelope-o"></i> Soạn mail</div>
	  	<div  style="width: 80%;margin: 20px;">
		    <form action="{{ url('admin/mail/createsubmit') }}" method="POST" accept-charset="utf-8">
		    	{{ csrf_field() }}
	          	<div class="form-inline">
	          		<label for="nameTo" class="col-md-3">Người Nhận</label>
	          		<input class="form-control col-md-9" type="text" name="nameTo" value="{{ $name }}" readonly >
	          	</div>
	          	<div class="form-inline" style="margin-top:10px;">
	          		<label for="mailTo" class="col-md-3">Email To</label>
	          		<input class="form-control col-md-9" type="text" name="mailTo" value="{{ $email }}" readonly >
	          	</div>
	          	<div class="form-inline" style="margin-top:10px;">
	          		<label for="title" class="col-md-3">Tiêu đề</label>
	          		<input class="form-control col-md-9" type="text" name="title"  >
	          	</div>
	          	<div class="form-inline" style="margin-top:10px;">
	          		<label  class="col-md-3">Mail mẫu</label>
	          		<select  name="template" class="form-control" style="margin-top:10px;">
	          				<option value="0">--- Chọn mail mẫu ---</option>
	          			@foreach($list as $title )
	          				<option value="{{$title->id}}">{{$title->title}}</option>
	          			@endforeach
	          		</select>
	          	</div>
	          	<div class="form-inline" style="margin-top:10px;">
	          		<label for="content" class="col-md-3">Nội dung</label>
					<textarea id="content" name="content" class="ckeditor"></textarea>
	          	</div>
	          	<div class="form-inline" style="margin-top:10px;">
	          		<button type="submit" class="btn btn-outline-primary"><i class="fa fa-fw fa-send-o"></i>Gửi mail</button>
	          	</div>
		    </form>
		</div>
	</div>
	<script type="text/javascript">

		$(document).ready(function() {

			$('select[name=template]').change(function(){
				var id = $(this).val();
				if(id != '0')
				{
					$.ajax({
						url: '/admin/mail/getcontent/'+id,
						type: 'GET',
						success:function(result)
						{
							CKEDITOR.instances.content.setData( result );		
						}
					});
				}
			});

		});
	</script>
@endsection
