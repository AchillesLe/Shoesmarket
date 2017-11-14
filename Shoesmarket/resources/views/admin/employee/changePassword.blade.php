<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ChangePassword</title>
  <base href="{{asset('')}}">
  <link href="sourceAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="sourceAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="sourceAdmin/css/sb-admin.css" rel="stylesheet">
  <script src="sourceAdmin/vendor/popper/popper.js"></script>
  <script src="sourceAdmin/vendor/popper/popper.min.js"></script>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đổi mật khẩu</div>
      <div class="card-body">
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
        <form action="{{url('admin/changepass')}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <label for="username">Tên tài khoản</label>
            <input class="form-control" name="username" id="username" type="text" placeholder="Nhập username">
          </div>
          <div class="form-group">
            <label for="oldpassword">Mật khẩu cũ</label>
            <input class="form-control" id="oldpassword" type="password" name="oldpassword" placeholder="Nhập password cũ">
          </div>
          <div class="form-group">
            <label for="newpassword">Mật khẩu mới</label>
            <input class="form-control" id="newpassword" name="newpassword" type="password" placeholder="Nhập password mới">
          </div>
          <div class="form-group">
            <label for="comfirmpass">xác nhận mật khẩu mới</label>
            <input class="form-control" id="comfirmpass" name="comfirmpass" type="password" placeholder="Xác nhận password mới">
            <span hidden class="text-danger">Mật khẩu xác nhận không đúng</span>
          </div>

          <button type="submit" class="btn btn-outline-primary btn-block" id="change" name="change" hidden>Thay đổi</button>
        </form>
        <hr>
        <a  href="{{url('admin/login')}}"   name="change">Trở lại đăng nhập</a>
      </div>
    </div>
  </div>
  <script src="sourceAdmin/vendor/jquery/jquery.min.js"></script>
  <script src="sourceAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="sourceAdmin/vendor/popper/popper.min.js"></script>
</body>
<script type="text/javascript">
		$(document).ready(function(){
			$('#comfirmpass').on('input',function(e){
				$old = $('#oldpassword').val();
				$new = $('#newpassword').val();
				$com = $('#comfirmpass').val();
				if($com===$new)
				{
					$('#change').removeAttr('hidden');
					$('#comfirmpass').css('border-color', '#00b300');
				}
				else
				{
					$('#comfirmpass').css('border-color', '#ff3333');
				}
			});
		});
</script>
</html>

