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
      $principal = 0;
      if($total_installment != ""){
        $principal = $total_installment / $terms;
      }

      $kweri = $dbcon->query("SELECT id as ID FROM map_box WHERE lot_no='".$_GET['lot_no']."' AND block_no = '".$_GET['block_no']."'") or die(mysqli_error());
      $fetch = $kweri->fetch_assoc();

      $update = $dbcon->query("UPDATE map_box SET box_name='".$_SESSION['FirstName']."' , box_status = '1' WHERE block_no='".$_GET['block_no']."' AND lot_no = '".$_GET['lot_no']."'") or die(mysqli_error());
      if($total_installment == ''){
        echo "<script>alert('Total installment must not be empty.');</script>";
      }else{
      $insertArray = array(
        "map_id"            =>$fetch['ID'],        
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
      for ($i=1; $i <= $terms; $i++) { 
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
      echo "<script>alert('You have successfully reserve the lot.'); window.location = 'index.php';</script></script>";
    }
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
            <h1 class="m-0 text-dark">Step 2: Choose number of terms</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Reservation</li>
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
                    <div class="col-md-4"><?php echo $_GET['block_no']?></div>
                    <div class="col-md-2"><strong>Lot No:</strong></div>
                    <div class="col-md-4"><?php echo $_GET['lot_no']?></div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-2"><strong>Payment Option:</strong></div>
                    <div class="col-md-4">
                        <?php if($_GET['payment_option'] == '1'){
                            echo 'With Downpayment';
                        }elseif($_GET['payment_option'] == '0'){
                            echo 'No downpayment';
                        }?>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        
                        
                    </div>
                </div>
                <P></P>
                <div class="row">
                    <div class="col-md-2"><strong>Contract Price:</strong></div>
                    <div class="col-md-4"> &#8369; <?php echo $_GET['price'];?></div>
                </div>
                <br>
              </div>
            </div>
          </div>
          
                  <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">&#8369; Total Price</h5>
              </div>
              <div class="card-body" style="font-size:22px;">
                     <form method="post">
<?php
  $dp = (float)$_GET['price'] * 0.20; 
?>
<form method="post">
<table class="table">
  <tr>
    <td><strong>Contract Price:</strong></td>
    <td><input type="text" name="contract_price" id="price" onkeyup="sum();" value="<?php echo $_GET['price']?>" class="form-control" readonly></td>
    <td><strong>Terms:</strong></td>
    <td>
<select class="form-control" name="terms" id="txt1" onkeyup="sum();">
  <option value="12">12 months</option>
  <option value="12">24 months</option>
  <option value="36">36 Months</option>
  <option value="48">48 Months</option>
  <option value="48">60 Months</option>
  <option value="48">72 Months</option>
</select>
    </td>
  </tr>

  <tr>
    <td><strong>Reservation Fee:</strong></td>
    <td>
      <select class="form-control" name="reservation_fee" id="txt2"  onkeyup="sum();">
    <option value="500">500</option>
    <option value="1000">1000</option>
  </select>
    </td>
     <td><strong>Downpayment:</strong></td>
    <td><input type="text" name="dp" id="txt3" onkeyup="sum();" value="<?php echo $dp;?>" class="form-control" readonly></td>
  </tr>

  <tr>
    <td><strong>Total Installment:</strong>
</td>
    <td>
      <input type="text" required id="txt4" class="form-control" name="total_installment" readonly/>

    </td>
  </tr>
  <tr>
      <td></td>
      <td>
          <button class="btn btn-primary" name="save_button"><i class="fa fa-save"></i> Save</button>
          <a href="../map/index.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Return</a>
      </td>
  </tr>
</table>
</form>
               
                <br>
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
<script>
  function sum() {
  var ContractPrice = document.getElementById('price').value;
  var terms = document.getElementById('txt1').value;
  var reservation = document.getElementById('txt2').value;
  var Downpayment = document.getElementById('txt3').value;

  var result = (parseInt(ContractPrice) - (parseInt(reservation) + parseInt(Downpayment)) + (parseInt(ContractPrice) - (parseInt(reservation) + parseInt(Downpayment))) * parseInt(terms) / 100);
  if (!isNaN(result)) {
      document.getElementById('txt4').value = Math.abs(result);
  }
        }
</script>
</body>
</html>
