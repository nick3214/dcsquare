<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';

  $id = $_POST['id'];

  $query = $dbcon->query("update map_box set lot_price = 1 where id='".$id."'");
  if($query){
      echo "succes";
  }else{
      echo "error";
  }