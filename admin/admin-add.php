<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';

  $block_no = $_POST['block_no'];
  $lot_no = $_POST['lot_no'];
  $box_name = $_SESSION['FirstName'];
  $box_date = $_POST['date'];
  $box_due_date = $_POST['years'];
  $verify = $dbcon->query("select * from map_box where block_no='".$block_no."'&& lot_no='".$lot_no."'");

      $update = $dbcon->query("update map_box set 
                                box_name='".$box_name."',
                                box_date='".$box_date."',
                                box_due_date='".$box_due_date."',
                                box_status=2
                                where  block_no='".$block_no."' && lot_no='".$lot_no."'");
      if($update){
        echo "success";
      }else{
        echo "error";
      }
  
  ?>