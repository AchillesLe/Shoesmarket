@extends('admin.master')
@section('content')
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href='{{url('admin/user/list')}}'>Doanh thu</a>
        </li>
        <li class="breadcrumb-item active">Doanh thu theo khoảng thời gian</li>
	</ol>
	<div class="card mb-3">
    <div class="card">
      <h3 class="card-header">Doanh thu</h3>
      <div class="card-block" style="padding: 10px;">
          <form action="" method="POST" accept-charset="utf-8"> 
            {{  csrf_field() }}
            <div class="row">
	            <div class="form-group col-md-6 form-inline">
	            	<label for="datestart">Ngày bắt đầu :</label>
	              	<input class="form-control col-md-8" type="date"  name="datestart" id="datestart" >
	            </div>
	            <div class="form-group col-md-6 form-inline">
	              <label for="datefinsh" >Ngày kết thúc :</label>
	              <input class="form-control col-md-8" type="date" name="datefinsh" id="datefinsh" >
	            </div>
          	</div>
          <div class="col-md-12" align="center">
            <input type="submit" class="btn btn-primary" name="addpenalize" value="Thống kê">
          </div>
          </form>
      </div>
    </div>
  </div>
@endsection