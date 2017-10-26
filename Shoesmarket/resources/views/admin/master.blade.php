<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Shoes Market</title>
  <base href="{{asset('')}}">
  <!-- Bootstrap core CSS-->
  <link href="sourceAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="sourceAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="sourceAdmin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="sourceAdmin/css/sb-admin.css" rel="stylesheet">
  <link href="sourceAdmin/css/custom-admin.css" rel="stylesheet">
  <script src="sourceAdmin/vendor/jquery/jquery.min.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  @include('admin.layout.menu')
  <div class="content-wrapper">
    <div class="container-fluid">
     	 @yield('content')
    </div>

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © our Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    
  </div>

    <script src="sourceAdmin/vendor/popper/popper.min.js"></script>
    <script src="sourceAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="sourceAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="sourceAdmin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="sourceAdmin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="sourceAdmin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="sourceAdmin/js/sb-admin-datatables.min.js"></script>

</body>
</html>
