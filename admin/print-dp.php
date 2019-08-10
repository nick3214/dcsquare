<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';

  $reservation = getSingleRow("*","reservation_id","reservation",$_GET['reservation_id']);
  $user = getSingleRow("*","ID","accounts",$_GET['customer_id']);
?>
<?php include'../assets/header.php';?>
<style type="text/css">
 @media print {
  #printPageButton {
    display: none;
  }
}
</style>
<body>
	<div class="container">
		<center><h1>Official Receipt</h1></center>
		<hr>
	<strong>Customer Information</strong>
	<table class="table table-striped">
		<tr>
			<td>Full Name:</td>
			<td><?php echo $user['FirstName']?> <?php echo $user['MiddleName']?> <?php echo $user['LastName']?></td>
			<td>Email Address:</td>
			<td><?php echo $user['EmailAddress']?></td>
		</tr>
		<tr>
			<td>Contact Number:</td>
			<td><?php echo $user['ContactNumber']?></td>
			<td>Address:</td>
			<td><?php echo $user['PermanentAddress']?></td>
		</tr>
	</table>
	<hr>
	<strong>Payment Information</strong>
		<table class="table table-striped">
		<tr>
			<td>Transaction #:</td>
			<td><?php echo $reservation['tcode']?></td>
			<td>Date Issued:</td>
			<td><?php echo $_GET['date_create']?></td>
		</tr>
		<tr>
			<td>Total Payment:</td>
			<td>&#8369; <?php echo number_format($reservation['dp'],2)?></td>
		</tr>	
	</table>
		<center>
		<a href="" class="btn btn-danger" onclick="print()" id="printPageButton"><i class="fa fa-print"></i> Print</a>
	</center>
	</div>
</body>