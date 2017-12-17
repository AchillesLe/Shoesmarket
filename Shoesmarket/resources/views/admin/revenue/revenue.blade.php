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
            <div class="row">
              {{csrf_field()}}
	            <div class="form-group col-md-6 form-inline">
	            	<label for="datestart" class="col-md-3"><trong>Ngày bắt đầu </trong> </label>
	              	<input class="form-control col-md-7" type="date"  name="datestart" id="datestart" >
	            </div>
	            <div class="form-group col-md-6 form-inline">
	              <label for="datefinish" class="col-md-3"><trong>Ngày kết thúc </trong> </label>
	              <input class="form-control col-md-7" type="date" name="datefinish" id="datefinish" >
	            </div>
          	</div>
          <div class="col-md-12" align="center">
            <input type="button" class="btn btn-primary" name="thongke" value="Thống kê">
          </div>
      </div>
    </div>
  </div>
  <div class="card mb-3" id="div-result">
    <div class="card">
      <h3 class="card-header">Kết quả</h3>
      <div class="card-block" style="padding: 10px;">
            <div class="row">
              <div class="form-group col-md-6 form-inline">
                <label for="datestart" class="col-md-3"><trong>Tổng </trong> </label>
                  <input class="form-control col-md-5" type="number" readonly name="result" id="result" >
              </div>
            </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('input[name=thongke]').click(function(event) {
              $datestart = $('input[name=datestart]').val();
              $datefinish = $('input[name=datefinish]').val();
              $_token = $('input[name=_token]').val();
              $.ajax({
                url: '{{url('/revenue/interval')}}',
                type: 'POST',
                cache:false,
                dataType: 'json',
                data: {_token:$_token,datestart: $datestart,datefinish:$datefinish},
                success:function(response)
                {
                    alert(response);
                }
              });
              
              
        });
    });
  </script>
@endsection