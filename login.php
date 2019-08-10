<?php
include 'config/db.php';
include 'config/functions.php';
include 'config/main_function.php';

if(!empty($_SESSION['login_admin']))
{
    header("location: admin/");
}
if(!empty($_SESSION['login_user']))
{
    header("Location: user/");
}

if(isset($_POST['login_btn'])){
  $login = login();

  if(!empty($login)){
    foreach ($login as $key => $value) {
      if($value->UserRole == '0'){//Administrator
           $_SESSION['ID']       = $value->ID;
           $_SESSION['UserName'] = $value->UserName;
           $_SESSION['EmailAddress'] = $value->EmailAddress;
           $_SESSION['FirstName'] = $value->FirstName;
           $_SESSION['MiddleName'] = $value->MiddleName;
           $_SESSION['LastName'] = $value->LastName;
           $_SESSION['UserRole'] = $value->UserRole;
           $_SESSION['login_admin'] = 'login_admin';
          header("location: admin/");
      }elseif($value->UserRole == '1'){ //User
           $_SESSION['ID'] = $value->ID;
           $_SESSION['UserName'] = $value->UserName;
           $_SESSION['EmailAddress'] = $value->EmailAddress;
           $_SESSION['FirstName'] = $value->FirstName;
           $_SESSION['MiddleName'] = $value->MiddleName;
           $_SESSION['LastName'] = $value->LastName;
           $_SESSION['UserRole'] = $value->UserRole;
           $_SESSION['login_user'] = 'login_user';
          header("location: user/");
      }
    }
  }else{
    $msg = 'Username/Password is not correct.';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Account</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style type="text/css">
  #bg{
    background:url('image/backgroundimage.jpg');
    -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
</style>
<body id="bg" class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="image/DC logo.jpg" >
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php if(isset($msg)):?>
        <div class="alert alert-danger"><?php echo $msg; ?></div>
      <?php endif;?>
      <form method="post">
        <div class="form-group has-feedback">
          <input type="email" name="UserName" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="PassWord" class="form-control" placeholder="Password" required>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="login_btn"><i class="fa fa-lock"></i> Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
    -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
