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

if(isset($_POST['save_button'])){
  $EmailAddress = filter($_POST['EmailAddress']);
  $PassWord = filter($_POST['PassWord']);
  $ConfirmPass = filter($_POST['ConfirmPass']);
  $FirstName = filter($_POST['FirstName']);
  $MiddleName = filter($_POST['MiddleName']);
  $LastName = filter($_POST['LastName']);
  $ContactNumber = filter($_POST['ContactNumber']);
  $PermanentAddress = filter($_POST['PermanentAddress']);

  if(checkName($FirstName,$MiddleName,$LastName)){
    $msg = 'This Name already exist.';
  }elseif(CheckUser($EmailAddress)){
    $msg = 'Email Address already exist. ';
  }elseif($PassWord != $ConfirmPass){
    $msg = 'Password do not matched.';
  }else{
    $array_insert = array(
    "EmailAddress"      =>$EmailAddress,
    "Password"          =>hash('sha256',$PassWord),
    "FirstName"         =>$FirstName,
    "MiddleName"        =>$MiddleName,
    "LastName"          =>$LastName,
    "ContactNumber"     =>$ContactNumber,
    "PermanentAddress"  =>$PermanentAddress,
    "UserRole"          =>"1",
    "UserStatus"        =>"0",
    "UserName"          =>$EmailAddress
  );
  SaveData('accounts',$array_insert);
  $subject = "GHS Official Website Registration";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= "From: admin@ghsofficial.online" . "\r\n";
  $to = ''.$EmailAddress.'';
  //
  $message = 'Good day!<br>
  <p>Please be informed that you have successfully registered to our website. To verify your account please click the link below.</p>
  <ul>
    <li>Username: '.$EmailAddress.'</li>
    <li>Password: '.$ConfirmPass.'</li>
  </ul>
  <br>
  <a href="www.ghsofficial.online/verify.php?email='.$EmailAddress.'" target="_blank">Click here to verify</a>
  <br>
  <p>For more inquiries please visit our website: www.ghsofficial.online</p>

  <strong>Thank you!</strong>';
  $mailme = mail($to,$subject,$message,$headers);
  $success = 'You have successfully registered to our site. Please verify to your email to have access.';
  }
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
<style type="text/css">
  #register_page{
    width:65%; margin: 0 auto; background:white;padding:10px;margin-top:20px;
  }
  #logo{
    margin-top:50px;
  }
</style>
<body class="hold-transition login-page">
  <div id="logo" class="login-logo">
    <img src="image/DC logo.jpg" class="img-circle">
  </div>
<div id="register_page">
   <?php if(isset($msg)):?>
        <div class="alert alert-danger"><?php echo $msg; ?></div>
      <?php endif;?>
      <?php if(isset($success)):?>
        <div class="alert alert-success"><?php echo $success; ?></div>
      <?php endif;?>
      <form method="post" autocomplete="on">
        <div class="row">
          <div class="col-md-6">
            <strong>Email Address:</strong><br>
            <input type="email" name="EmailAddress" class="form-control" placeholder="Email Address / Username" <?php if(isset($_POST['save_button'])): echo $_POST['EmailAddress']; endif;?>>
          </div>
          <div class="col-md-6">
            <strong>Password:</strong><br>
             <input type="password" name="PassWord" class="form-control" placeholder="Password" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-6">
            <strong>Confirm Password:</strong><br>
            <input type="password" name="ConfirmPass" class="form-control" placeholder="Confirm Password" required>
          </div>
          <div class="col-md-6">
            <strong>First Name:</strong><br>
             <input type="text" name="FirstName" class="form-control" placeholder="First Name" required <?php if(isset($_POST['save_button'])): echo $FirstName; endif;?>>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-6">
            <strong>Middle Name:</strong><br>
            <input type="text" name="MiddleName" class="form-control" placeholder="Middle Name" required <?php if(isset($_POST['save_button'])): echo $MiddleName; endif;?>>
          </div>
          <div class="col-md-6">
            <strong>Last Name:</strong><br>
             <input type="text" name="LastName" class="form-control" placeholder="Last Name" required <?php if(isset($_POST['save_button'])): echo $LastName; endif;?>>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-6">
            <strong>Contact Number:</strong><br>
            <input type="text" name="ContactNumber" class="form-control" placeholder="Contact Number" required <?php if(isset($_POST['save_button'])): echo $ContactNumber; endif;?>>
          </div>
          <div class="col-md-6">
            <strong>Permanent Address:</strong><br>
             <input type="text" name="PermanentAddress" class="form-control" placeholder="Permanent Address" required <?php if(isset($_POST['save_button'])): echo $PermanentAddress; endif;?>>
          </div>
        </div><br>
        <div class="row">
          <!-- /.col -->
          <div class="col-3">
            <button class="btn btn-primary btn-block btn-flat" name="save_button"><i class="fa fa-save"></i> Signup</button>
            
          </div>
          <div class="col-3">
            <a href="index.php" class="btn btn-danger btn-block btn-flat"><i class="fa fa-arrow-left"></i> Return</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
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
