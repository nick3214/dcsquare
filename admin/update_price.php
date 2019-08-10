<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_admin'])){
    header("Location: ../index.php");
    exit;
  }

  $id = $_POST['id'];
  $price = $_POST['price'];

  $query = $dbcon->query("update map_color set map_price ='".$price."' where id='".$id."'");
  if($query){
      echo "success";
  }else{
      echo "error";
  }