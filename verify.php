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


if(isset($_GET['email'])){
  $arr_where = array("EmailAddress"=>$_GET['email']);//update where
  $arr_set = array("UserStatus"=>"1");//set update
  $tbl_name = "accounts";
  $update = UpdateQuery($dbcon,$tbl_name,$arr_set,$arr_where);   
  
  echo "<script>alert('Successfully verify your account'); window.location = 'login.php';</script>";
  
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create Account</title>
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

<body class="hold-transition login-page">


<!-- /.login-box -->

<!-- jQuery -->

</body>
</html>
