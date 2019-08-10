<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_user'])){
    header("Location: ../index.php");
    exit;
  }
  $user = getSingleRow("*","ID","accounts",$_SESSION['ID']);
    if(isset($_POST['save_button'])){
      $ContractPrice = $_GET['price'];
      $terms = filter($_POST['terms']);
      $reservation_fee = filter($_POST['reservation_fee']);
      $dp = filter($_POST['dp']);
      $total_installment = filter($_POST['total_installment']);
      $today = date('Y-m-d');
      $principal = $total_installment / $terms; 
      $insertArray = array(
        "tcode"             =>mt_rand(),
        "ID"                =>$_SESSION['ID'],
        "terms"             =>$terms,
        "reservation_fee"   =>$reservation_fee,
        "dp"                =>$dp,
        "total_installment" =>$total_installment,
        "date_created"      =>$today
      );
      SaveData("reservation",$insertArray);
      $ID = mysqli_insert_id($dbcon);
      for ($i=1; $i < $terms; $i++) { 
        $repeat = strtotime("+1 day",strtotime($today));
        $today = date('Y-m-t',$repeat);
        $payment = array(
          "reservation_id"   =>$ID,
          "DateDue"          =>date("M j, Y",strtotime($today)),
          "DatePaid"         =>"",
          "Total"            =>"",
          "Interest"         =>"",
          "Principal"        =>$principal,
          "Balance"          =>"",
          "official_receipt" =>"",
          "Purchaser"        =>$_SESSION['ID'],
          "Cashier"          =>""
        );
        SaveData("reservation_payment",$payment);
      }
      header("location: index.php");
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
                <h5 class="m-0"><i class="fa fa-user"></i> My Reservation</h5>

              </div>
              <div class="card-body">
<table class="table table-striped" id="example1" style="font-size:12px;">
  <thead>
  <tr>
    <th>Transaction #</th>
    <th>Lot Number / Block No.</th>
    <th>Terms</th>
    <th>Downpayment</th>
    <th>Total Installment</th>
    <th>Status</th>
    <th>Option</th>
  </tr>
  </thead>
  <tbody>
<?php 
  $query = $dbcon->query("SELECT * FROM reservation INNER JOIN map_box on map_box.id = reservation.map_id WHERE reservation.ID = '".$_SESSION['ID']."'") or die(mysqli_error());
  while($row = $query->fetch_assoc()){
?>
<tr>
    <td><?php echo $row['tcode']?></td>
    <td><?php echo $row['block_no']?> / <?php echo $row['lot_no']?></td>
    <td><?php echo $row['terms']?> Months</td>
    <td><?php echo $row['dp']?></td>
    <td>&#8369; <?php echo number_format($row['total_installment'],2)?></td>
    <td>
      <?php 
      if($row['r_status'] == '0'){
        echo 'Waiting for Downpayment';
      }elseif($row['r_status'] == '1'){
        echo 'Paid';
      }elseif($row['r_status'] == '2'){
        echo 'Cancelled';
      }
      ?>
        
    </td>
    <td>
      <a href="" class="btn btn-danger btn-sm">View</a>
    </td>
  </tr>
<?php 
}
?>
    </tbody>
</table>

              </div>
            </div>
          </div>
          

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
