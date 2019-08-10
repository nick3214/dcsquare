<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_admin'])){
    header("Location: ../index.php");
    exit;
  }
  $user = getSingleRow("*","ID","accounts",$_GET['ID']);
  $map = getSingleRow("*","id","map_box",$_GET['map_id']);
  $reservation = getSingleRow("*","tcode","reservation",$_GET['tcode']);
  if(isset($_POST['pay_btn'])){
    $rp_id = filter($_POST['rp_id']);
    $DatePaid = filter($_POST['DatePaid']);
    $Total = filter($_POST['Total']);
    $Interest = filter($_POST['Interest']);
    $Balance = filter($_POST['Balance']);
    $official_receipt = filter($_POST['official_receipt']);

    $arr_where = array("rp_id"=>$rp_id);//update where
    $arr_set = array(
      "DatePaid"     =>$DatePaid,
      "Total"        =>$Total,
      "Interest"     =>$Interest,
      "Balance"      =>$Balance
    );//set update
    $tbl_name = "reservation_payment";
    $update = UpdateQuery($dbcon,$tbl_name,$arr_set,$arr_where);
    echo "<script>alert('Successfully Paid'); window.location = 'reservation.php';</script>"; 
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
            <h1 class="m-0 text-dark"><i class="fa fa-plus"></i> View Details</h1>
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
              <div class="card-header">
                <h5 class="m-0"><i class="fa fa-user"></i> Customer Information</h5>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-2"><strong>Full Name:</strong></div>
                    <div class="col-md-4"><?php echo $user['FirstName']?> <?php echo $user['MiddleName']?> <?php echo $user['LastName']?></div>
                    <div class="col-md-2"><strong>Email Address:</strong></div>
                    <div class="col-md-4"><?php echo $user['EmailAddress']?></div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-2"><strong>Contact Number:</strong></div>
                    <div class="col-md-4"><?php echo $user['ContactNumber']?></div>
                    <div class="col-md-2"><strong>Address:</strong></div>
                    <div class="col-md-4"><?php echo $user['PermanentAddress']?></div>
                </div>
                <P></P>
                <div class="row">
                    <div class="col-md-2"><strong>Status:</strong></div>
                    <div class="col-md-4"><span style="color:green;">Active</span></div>
                </div>
                <br>
              </div>
            </div>
          </div>

        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0"><i class="fa fa-th"></i> Lot Information</h5>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-2"><strong>Block No.:</strong></div>
                    <div class="col-md-4"><?php echo $map['lot_no']?></div>
                    <div class="col-md-2"><strong>Lot No:</strong></div>
                    <div class="col-md-4"><?php echo $map['block_no']?></div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-2"><strong>Contract Price.:</strong></div>
                    <div class="col-md-4">&#8369; <?php echo number_format($map['lot_price'],2)?></div>
                    <div class="col-md-2"><strong>Reservation Fee:</strong></div>
                    <div class="col-md-4">&#8369; <?php echo number_format($reservation['reservation_fee'],2)?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><strong>Downpayment:</strong></div>
                    <div class="col-md-4">&#8369; <?php echo number_format($reservation['dp'],2)?></div>
                    <div class="col-md-2"><strong>Terms:</strong></div>
                    <div class="col-md-4"><?php echo $reservation['terms']?> Months</div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-2"><strong>Total Installment:</strong></div>
                    <div class="col-md-4">&#8369; <?php echo number_format($reservation['total_installment'],2)?></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4"></div>
                </div>
              </div>
            </div>
          </div>

                  <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0"><i class="fa fa-plus"></i> Payment</h5>
              </div>
              <div class="card-body">
<div class="table-responsive">
<table class="table table-striped" style="font-size:12px;">
<thead>
    <tr>
      <th>ID</th>
      <th>Date Due</th>
      <th>Date Paid</th>
      <th>Total</th>
      <th>Interest</th>
      <th>Principal</th>
      <th>Balance</th>
      <th>OR#</th>
      <th>Purchaser</th>
      <th>Cashier</th>
      <th></th>
    </tr>
</thead>
<tbody>
  <?php 
  $i = 1;
  $kweri = $dbcon->query("SELECT * FROM reservation_payment WHERE reservation_id = '".$reservation['reservation_id']."'") or die(mysqli_error());
  while($fetch = $kweri->fetch_assoc()){
    $user = getSingleRow("*","ID","accounts",$fetch['Purchaser']);
  ?>
  <form method="post">
    <tr>
      <td><?php echo $i++;?></td>
      <td width="130"><?php echo $fetch['DateDue']?></td>
      <td width="10">
        <input type="date" name="DatePaid" value="<?php echo $fetch['DatePaid']?>" style="width:120px;height:35px;" required>
      </td>
      <td>
        <input type="number" name="Total" class="form-control" value="<?php echo $fetch['Total']?>" required>
      </td>
      <td>
        <input type="text" name="Interest" class="form-control" value="<?php echo $fetch['Interest']?>" required>
      </td>
      <td><?php echo $fetch['Principal']?></td>
      <td>
        <input type="text" name="Balance" class="form-control" value="<?php echo $fetch['Balance']?>" required>
      </td>
      <td>
        <input type="text" name="official_receipt" class="form-control" value="<?php echo $fetch['official_receipt']?>" required>
      </td>
      <td>
        <?php echo $user['FirstName']?> <?php echo $user['LastName']?>
      </td>
      <td></td>
      <td>
        
          <input type="hidden" name="rp_id" value="<?php echo $fetch['rp_id']?>">
          <button class="btn btn-info btn-sml" name="pay_btn"><i class="fa fa-save"></i></button>
        
      </td>
    </tr>
    </form>
  <?php 
  }
  ?>
</table>
</div>


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
</body>
</html>
