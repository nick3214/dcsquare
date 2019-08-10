<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_admin'])){
    header("Location: ../index.php");
    exit;
  }
if(isset($_GET['cat_id'])){
 $category = getSingleRow("*","cat_id","map_category",filter($_GET['cat_id']));
}
if(isset($_POST['update_btn'])){

  $box_price = filter($_POST['box_price']);
  $box_name = filter($_POST['box_name']);

  $arr_where = array("cat_id"=>$_GET['cat_id']);//update where
  $arr_set = array("box_price"=>$box_price);//set update
  $tbl_name = "map_category";
  $update = UpdateQuery($dbcon,$tbl_name,$arr_set,$arr_where); 

  $arr_where2 = array("block_no" =>$box_name);//update where
  $arr_set2 = array("lot_price"  =>$box_price);//set update
  $tbl_name2 = "map_box";
  $update = UpdateQuery($dbcon,$tbl_name2,$arr_set2,$arr_where2);

  header("location: map-category.php"); 
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
            <h1 class="m-0 text-dark"><i class="fa fa-pencil"></i> Map Category Information</h1>
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
<form method="post">
<div class="row">
  <div class="col-md-4">Block Name:</div>
  <div class="col-md-6">
    <input type="text" name="box_name" readonly class="form-control" value="<?php echo $category['box_name']?>">
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">Category Name:</div>
  <div class="col-md-6">
    <input type="text" name="cat_name" readonly class="form-control" value="<?php echo $category['cat_name']?>">
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">Price:</div>
  <div class="col-md-6">
    <input type="text" name="box_price" class="form-control" value="<?php echo $category['box_price']?>">
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-6">
    <button class="btn btn-primary" name="update_btn"><i class="fa fa-save"></i> Update</button>
    <a href="map-category.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Return</a>
  </div>
</div>
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
