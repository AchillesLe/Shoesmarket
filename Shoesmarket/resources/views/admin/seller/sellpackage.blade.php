@extends('admin.master')
@section('content')
	
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          Nhóm người bán hàng
        </li>
        <li class="breadcrumb-item active">Bán gói tin</li>
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
		<div class="card">
		  <h3 class="card-header">Phiếu bán gói tin</h3>
		  <div class="card-block" style="padding: 10px;">
		    	<form action="{{route('post.sellpackage')}}" method="POST" accept-charset="utf-8">
		    		 {{  csrf_field() }}
		    		<div class="form-group row">
					  <label for="employeesName" class="col-2 col-form-label">Người Lập phiếu</label>
					  <div class="col-9">
					    <input class="form-control" type="text" value="{{Auth::guard('admin')->user()->name}}" name="employeesName" id="employeesName" readonly>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="sellername" class="col-2 col-form-label">Tên người bán</label>
					  <div class="col-9">
					    <input class="form-control" type="text" value="{{$seller->id}}" name="seller" id="sellername" readonly="">
					  </div>
					</div>
					<div class="form-group row">
					  <label for="packagename" class="col-2 col-form-label">Gói tin</label>
					  <div class="col-9">
					    <select class="form-control" name="packagename">
					    	@foreach($listpackage as $item)
					    		<option value="{{$item->name}}-{{$item->money}}-{{$item->newquantity}}">{{$item->name}}--{{$item->money}} VNĐ / {{$item->newquantity}} Tin</option>
					    	@endforeach
					    </select>
					  </div>
					</div>
					<div class="form-group row">
					  <label for="qty" class="col-2 col-form-label">Số lượng gói tin</label>
					  <div class="col-2">
					    <input class="form-control" type="number" value="1" min="1" name="qty" required >
					  </div>
					</div>
					<div class="col-md-12" align="center">
						<input type="submit" class="btn btn-primary" name="addreceipt" value="Lưu phiếu">
					</div>
		    	</form>
		  </div>
		</div>
	</div>
@endsection