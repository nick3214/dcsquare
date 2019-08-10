<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_admin'])){
    header("Location: ../index.php");
    exit;
  }
if(isset($_POST['generate_dp'])){
  $reservation_id = filter($_POST['reservation_id']);
  $date_today = $_POST['date_today'];
  $payment = filter($_POST['reservation_fee']);

  $getUser = getSingleRow("*","reservation_id","reservation",$reservation_id);
  $message = 'You have successfully paid the downpayment worth: '.$payment.'';
  $insertArray = array(
    "reservation_id"    =>$reservation_id,
    "total_payment"     =>$payment,
    "date_created"      =>$date_today,
    "customer_id"       =>$getUser['ID'],
    "payment_desc"      =>$message
  );
  SaveData("payment_list",$insertArray);
  $arr_where = array("reservation_id"=>$_POST['reservation_id']);//update where
  $arr_set = array("r_status"=>"3");//set update
  $tbl_name = "reservation";
  $update = UpdateQuery($dbcon,$tbl_name,$arr_set,$arr_where);
  header("location: print-dp.php?customer_id=".$getUser['ID']."&reservation_id=".$reservation_id."&date_create=".$date_today."&fee=".$payment.""); 
}

if(isset($_POST['generate'])){
  $reservation_id = filter($_POST['reservation_id']);
  $date_today = $_POST['date_today'];
  $payment = filter($_POST['reservation_fee']);

  $getUser = getSingleRow("*","reservation_id","reservation",$reservation_id);
  $message = 'You have successfully paid the reservation fee worth '.$payment.'';
  $insertArray = array(
    "reservation_id"    =>$reservation_id,
    "total_payment"     =>$payment,
    "date_created"      =>$date_today,
    "customer_id"       =>$getUser['ID'],
    "payment_desc"      =>$message
  );
  SaveData("payment_list",$insertArray);
  $arr_where = array("reservation_id"=>$_POST['reservation_id']);//update where
  $arr_set = array("r_status"=>"1");//set update
  $tbl_name = "reservation";
  $update = UpdateQuery($dbcon,$tbl_name,$arr_set,$arr_where);
  header("location: print-reservation.php?customer_id=".$getUser['ID']."&reservation_id=".$reservation_id."&date_create=".$date_today."&fee=".$payment.""); 
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
            <h1 class="m-0 text-dark"><i class="fa fa-book"></i> Reservation</h1>
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
                <table class="table table-striped" id="example1" style="font-size:12px;">
  <thead>
  <tr>
    <th>Transaction #</th>
    <th>Lot Number / Block No.</th>
    <th>Customer Name</th>
    <th>Date Reserve</th>
    <th>Status</th>
    <th>Option</th>
  </tr>
  </thead>
  <tbody>
<?php 
  $query = $dbcon->query("SELECT * FROM reservation 
    INNER JOIN map_box on map_box.id = reservation.map_id
    INNER JOIN accounts on accounts.ID = reservation.ID") or die(mysqli_error());
  while($row = $query->fetch_assoc()){
?>
<tr>
    <td><?php echo $row['tcode']?></td>
    <td><?php echo $row['block_no']?> / <?php echo $row['lot_no']?></td>
    <td><?php echo $row['FirstName']?> <?php echo $row['MiddleName']?> <?php echo $row['LastName']?></td>
    <td><?php echo $row['date_created']?></td>
    <td>
      <?php 
      if($row['r_status'] == '0'){
        echo 'Waiting for Downpayment';
      }elseif($row['r_status'] == '1'){
        echo 'Partially Paid';
      }elseif($row['r_status'] == '2'){
        echo 'Cancelled';
      }elseif($row['r_status'] == '3'){
        echo 'Fully Paid';
      }
      ?>
        
    </td>
    <td>
      <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
  <ul class="dropdown-menu" role="menu" style="padding:8px;">
    <?php 
    if($row['r_status'] == '0'){
    ?> 
    <li>
      <a href="#" data-toggle="modal" data-target="#pay-reservation<?php echo $row['reservation_id']?>">Pay Reservation Fee</a>
    </li>
    <?php }elseif($row['r_status'] == '1'){?>
          <li>
      <a href="#" data-toggle="modal" data-target="#pay-dp<?php echo $row['reservation_id']?>">Pay Downpayment</a>
    </li>
    <?php }elseif($row['r_status'] == '3'){?>
      <li>
      <a href="view-details.php?map_id=<?php echo $row['map_id']?>&ID=<?php echo $row['ID']?>&tcode=<?php echo $row['tcode']?>">View Details</a>
      </li>
    <?php }else{?>
      No Option
    <?php }?>
      

  </ul>
                  </div>
    </td>
  </tr>

<!-- modal -->
     <div class="modal fade" id="pay-reservation<?php echo $row['reservation_id']?>" style="width:100%;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <strong>Generate Official Receipt for Reservation Fee</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
<?php 
  $dateReserve = strtotime($row['date_created']);
  $datetoday = strtotime(date("Y-m-d"));

  $diff = $datetoday - $dateReserve;
  $days = $diff / 86400;
?>
<?php if($days > 30):?>
  <div class="alert alert-danger">You have reached the maximum number of days to pay the reservation Fee.</div>
<?php else:?>
<form method="post">
<div class="row">
  <div class="col-md-4">Reservation Fee:</div>
  <div class="col-md-6">
    <input type="text" name="reservation_fee" class="form-control" value=" <?php echo $row['reservation_fee']?>" readonly>
    <input type="hidden" name="reservation_id" class="form-control" value=" <?php echo $row['reservation_id']?>" readonly>  
  </div>
</div>
<p></p>
<div class="row">
  <div class="col-md-4">Date Today:</div>
  <div class="col-md-6">
     <input type="date" name="date_today" class="form-control" value="<?php echo date("Y-m-d");?>" readonly>
  </div>
</div>
<p></p>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-6">
     <button class="btn btn-primary" name="generate"><i class="fa fa-check"></i> Generate Receipt</button>
  </div>
</div>
          
</form>
<?php endif;?>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
    <!-- end modal -->


<!-- modal -->
     <div class="modal fade" id="pay-dp<?php echo $row['reservation_id']?>" style="width:100%;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <strong>Generate Official Receipt for Downpayment</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
<?php 
  $dateReserve = strtotime($row['date_created']);
  $datetoday = strtotime(date("Y-m-d"));

  $diff = $datetoday - $dateReserve;
  $days = $diff / 86400;
?>
<?php if($days > 30):?>
  <div class="alert alert-danger">You have reached the maximum number of days to pay the reservation Fee.</div>
<?php else:?>
<form method="post">
<div class="row">
  <div class="col-md-4">Downpayment Fee:</div>
  <div class="col-md-6">
    <input type="text" name="dp" class="form-control" value=" <?php echo $row['dp']?>" readonly>
    <input type="hidden" name="reservation_id" class="form-control" value=" <?php echo $row['reservation_id']?>" readonly>  
  </div>
</div>
<p></p>
<div class="row">
  <div class="col-md-4">Date Today:</div>
  <div class="col-md-6">
     <input type="date" name="date_today" class="form-control" value="<?php echo date("Y-m-d");?>" readonly>
  </div>
</div>
<p></p>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-6">
     <button class="btn btn-primary" name="generate_dp"><i class="fa fa-check"></i> Generate Receipt</button>
  </div>
</div>
          
</form>
<?php endif;?>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
    <!-- end modal -->


<?php 
}
?>
    </tbody>
</table>
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
