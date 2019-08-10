<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_user'])){
    header("Location: ../index.php");
    exit;
  }
  $user = getSingleRow("*","ID","accounts",$_SESSION['ID']);
    
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">My Transaction</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0"><i class="fa fa-th"></i> Customer Transactions </h5>

              </div>
              <div class="card-body">
              <table class="table table-striped" id="example1" style="font-size:12px;">
  <thead>
  <tr>
    <th>Transaction # </th>
    <th>Lot Number / Block No.</th>
    <th>Description</th>
    <th>Date</th>
    
  </tr>
  </thead>
  <tbody>
<?php 
  $query = $dbcon->query("SELECT * FROM payment_list 
    INNER JOIN reservation on reservation.reservation_id = payment_list.reservation_id
    INNER JOIN map_box on map_box.id = reservation.map_id WHERE customer_id = '".$_SESSION['ID']."'") or die(mysqli_error());
  while($row = $query->fetch_assoc()){
?>
<tr>
    <td><?php echo $row['tcode']?></td>
    <td><?php echo $row['block_no']?> / <?php echo $row['lot_no']?></td>
    <td><?php echo $row['payment_desc']?></td>
    <td><?php echo $row['date_created']?></td>
  </tr>
<?php 
}
?>
    </tbody>
</table>
              </div>
            </div>
          </div>
        
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
<script>
  function sum() {
  var ContractPrice = document.getElementById('price').value;
  var terms = document.getElementById('txt1').value;
  var reservation = document.getElementById('txt2').value;
  var Downpayment = document.getElementById('txt3').value;

  var result = (parseInt(ContractPrice) - (parseInt(reservation) + parseInt(Downpayment)) + (parseInt(ContractPrice) - (parseInt(reservation) + parseInt(Downpayment))) * parseInt(terms) / 100);
  if (!isNaN(result)) {
      document.getElementById('txt4').value = result;
  }
        }
</script>
</body>
</html>
