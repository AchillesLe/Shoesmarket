<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Shoes Market</title>
  <!-- Bootstrap core CSS-->
  <base href="{{asset('')}}">
  <link href="sourceAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="sourceAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="sourceAdmin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="sourceAdmin/css/sb-admin.css" rel="stylesheet">
  <link href="sourceAdmin/css/custom-admin.css" rel="stylesheet">
  <script src="sourceAdmin/vendor/jquery/jquery.min.js"></script>
  <script src="sourceAdmin/vendor/popper/popper.js"></script>
  <script src="sourceAdmin/vendor/popper/popper.min.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  @include('admin.layout.menu')
                      {{-- @if(count($errors)>0)
                    <div class="alert alert-danger" id="noti">
                        @foreach($errors->all() as $err)
                           {{ $err }}<br>
                        @endforeach
                    </div>
                    @endif

                    @if(session('thongbao'))
                        <div  class="alert alert-success" id="noti" style="margin-top: 5px;">{{session('thongbao')}}</div>
                    @endif --}}
  <div class="content-wrapper">
    <div class="container-fluid">
     	 @yield('content')
    </div>

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © sbAdmin2 Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->

    <div class="modal fade" id="infoemployee" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin của bạn</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body infoEmploy" >
            <form action="{{url('admin/employee/update')}}" method="POST">
              {{csrf_field()}}
            <div class=" form-inline" hidden >
              <input class="form-control col-md-8" name="id" hidden value="{{Auth::user()->id}}">
            </div>
            <div class=" form-inline" >
              <label for="name" class="col-md-3"><b >Tên</b></label>
              <input class="form-control col-md-8" name="name" type="text" readonly value="{{Auth::user()->name}}">
            </div>
            <div class=" form-inline" >
              <label for="name" class="col-md-3"><b>Email</b></label>
              <input class="form-control col-md-8" name="email" type="email" readonly value="{{Auth::user()->email}}">
            </div>
            <div class=" form-inline" >
              <label for="name" class="col-md-3"><b>Địa chỉ</b></label>
              <input class="form-control col-md-8" name="address" type="text" value="{{Auth::user()->address}}">
            </div>
            <div class=" form-inline" >
              <label for="name" class="col-md-3"><b>Số điện thoại</b></label>
              <input class="form-control col-md-8" name="phone" type="text" value="{{Auth::user()->phone}}">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">đóng</button>
            <button class="btn btn-primary" type="submit" name="edit">Lưu</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    
  </div>

    <script src="sourceAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sourceAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="sourceAdmin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="sourceAdmin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="sourceAdmin/js/sb-admin.min.js"></script>
    <script src="sourceAdmin/js/sb-admin-datatables.min.js"></script>
</body>
</html>
