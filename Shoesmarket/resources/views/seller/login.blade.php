<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <base href="{{asset('')}}">
  <link href="sourceAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="sourceAdmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="sourceAdmin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="{!! route('postLogin') !!}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" name="email" id="email" type="text" placeholder="Nhập Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" name="password"  id="password" type="password" placeholder="Nhập Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <script src="sourceAdmin/vendor/jquery/jquery.min.js"></script>
  <script src="sourceAdmin/vendor/popper/popper.min.js"></script>
  <script src="sourceAdmin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="sourceAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
