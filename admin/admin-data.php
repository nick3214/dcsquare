<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';

  $id = $_POST['id'];
  //$lot_price = $_POST['lot_price'];
  $data = array();
  $verify = $dbcon->query("select * from map_box where id='".$id."'");
 
  while($row = $verify->fetch_assoc()){
    $price = $dbcon->query("select * from map_color where id='".$row['lot_price']."'");
    $object = $price->fetch_object();
    $show_price = 0;
   
    if(mysqli_num_rows($price)>= 1){
      $show_price = $object->map_price;
    }else{
      $show_price = $row['lot_price'];
    }
   
 
    if($row['box_status'] == 1 || $row['box_status'] == 2){
      // $data['age']  = $row['box_age'];
      $data['date'] = $row['box_date'];
      $data['years'] = $row['box_due_date'];
      $data['output'] = "success";
    }else{
        if(!empty($_SESSION['login_user']))
        {
          $data['output'] = "user";
        }else{
          $data['output'] = "admin";
        }
    }
  
    $data['lot_price'] = number_format($show_price,2);
    $data['lot_price1'] = $show_price;
    $data['name'] = $row['box_name'];
    $data['lot_no'] = $row['lot_no'];
    $data['block_no'] = $row['block_no'];
    $data['id'] = $row['id'];
  }

  echo json_encode($data);

 