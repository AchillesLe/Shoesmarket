@extends('admin.master')
@section('content')

	<div class="card card-block">
		<div class="card-header">
          <i class="fa  fa-info-circle"></i>Thông tin của tin đăng</div>
	  	<div  class="infonews">
		    {{-- <form action="{{ url('admin/mail/createsubmit') }}" method="POST" accept-charset="utf-8"> --}}
		    	{{-- {{ csrf_field() }} --}}
{{--                   <label for="image" class="col-md-3"><b>Ảnh sản phẩm</b></label> --}}
           <div class="col-md-3 image"><img src="{{asset('source/Upload').'/'.$news->product->image}}" name="image" width="180px" height="230px" alt="Đây là ảnh sản phẩm" ></div>

          <div class="col-md-9 sub_content_info" >
	          <div class="form-inline">
	                  <label for="created_at" class="col-md-3"><b>Ngày đăng</b></label>
	                  <input class="form-control col-md-9" type="text" name="note" readonly value="{{$news->created_at}}"/>
	          </div>
		      <div class="form-inline">
	                  <label for="namepro" class="col-md-3"><b>Tên sản phẩm</b></label>
	                  <input class="form-control col-md-9" type="text" name="namepro" readonly value="{{$news->product->name}}">
	          </div>
	          <div class="form-inline">
	                  <label for="quantity" class="col-md-3"><b>Tổng Số lượng</b></label>
	                  <input class="form-control col-md-9" type="text" name="quantity"  readonly value="{{$news->product->quantity}}">
	          </div>
	          <div class="form-inline">
	                  <label for="quantity" class="col-md-3"><b>Tổng Số lượng</b></label>
	                  <input class="form-control col-md-9" type="text" name="quantity"  readonly value="{{$news->product->quantity}}">
	          </div>
	          <div class="form-inline">
	                  <label for="cost" class="col-md-3"><b>Giá</b></label>
	                  <input class="form-control col-md-9" type="text" name="cost" readonly value="{{$news->product->price}}" >
	          </div>
	          <div class="form-inline">
	                  <label for="note" class="col-md-3"><b>Ghi chú</b></label>
	                  <textarea class="form-control col-md-9" name="note" readonly>{{$news->note}}</textarea>
	          </div>
          </div>
		   {{--  </form> --}}
		</div>
	</div>
	{{-- <script type="text/javascript">

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
	</script> --}}
@endsection
