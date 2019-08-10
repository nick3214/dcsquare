<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_admin'])){
    header("Location: ../index.php");
    exit;
  }
$contact = getSingleRow("*","contact_id","contact","1");
if(isset($_POST['save_btn'])){
    $c_address = filter($_POST['c_address']);
    $c_tel = filter($_POST['c_tel']);
    $c_email = filter($_POST['c_email']);


    
    $arr_where = array("contact_id"=>"1");//update where
    $arr_set = array(
      "c_address"     =>$c_address,
      "c_tel"         =>$c_tel,
      "c_email"       =>$c_email
    );//set update
    $tbl_name = "contact";
    $update = UpdateQuery($dbcon,$tbl_name,$arr_set,$arr_where);   
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated the contact details');
    window.location.href='contact.php';
    </script>");
    
  }
?>
<?php include'../assets/header.php';?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
<?php include'../assets/nav.php';?>
<?php include'../assets/sidebar.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fa fa-wrench"></i> Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <?php if(isset($msg)):?>
              <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $msg;?>
              <br />
            </div>
            <?php endif;?>
            <?php if(isset($success)):?>
              <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $success;?>
              <br />
            </div>
            <?php endif;?>
             <form method="post">
             <table class="table table-bordered">
                <tr>
                  <td>Address:</td>
                  <td><input type="text" name="c_address" class="form-control" placeholder="Address" required value="<?php echo $contact['c_address']?>"></td>
                </tr>
                 <tr>
                  <td>Telephone Number:</td>
                  <td><input type="text" name="c_tel" class="form-control" placeholder="Telephone Number" required value="<?php echo $contact['c_tel']?>"></td>
                </tr>
                 <tr>
                  <td>Email Address:</td>
                  <td><input type="email" name="c_email" class="form-control" placeholder="Email Address" required value="<?php echo $contact['c_email']?>"></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                     <button class="btn btn-primary btn-large" name="save_btn"><i class="fa fa-save"></i> Save</button>
                <a href="index.php" class="btn btn-danger btn-large"><i class="fa fa-arrow-left"></i> Return</a>
                  </td>
                </tr>
              </table>
          </form>
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

<?php include'../assets/footer.php';?>
</body>
</html>
