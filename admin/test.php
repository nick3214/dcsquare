<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';

  	$dbcon->query("UPDATE map_box SET lot_price = '5000' WHERE block_no = 'block10'") or die(mysqli_error());
  
?>