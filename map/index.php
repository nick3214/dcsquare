<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';

  function display($status,$id,$class){
    if($status == 1):
        echo "<li class='$class' style='background-color:red' id='$id' data-toggle='modal' data-target='#info'></li>";
    else:
        echo "<li class='$class' id='$id' data-toggle='modal' data-target='#info'></li>";
    endif;
  }
 function query($dbcon,$string){
    $result = $dbcon->query("select * from map_box where block_no ='".$string."'");
    return $result;
 }

 function mid($dbcon,$from,$to){
    $query = $dbcon->query("select * from map_box where block_no ='Block 11' && id >= '".$from."' && id <= '".$to."'");
     while($row = $query->fetch_assoc()){
         
         display($row['box_status'],$row['id'],"boxmid");
     }
 }

$block1 = query($dbcon,"block1");
$block2 = query($dbcon,"block2");
$block21 = query($dbcon,"block21");
$block3 = query($dbcon,"block3");
$block31 = query($dbcon,"block31");
$block4 = query($dbcon,"block4");
$block5 = query($dbcon,"block5");
$block6 = query($dbcon,"block6");
$block7c1 = query($dbcon,"block7c");
$block7c2 = query($dbcon,"block7c1");
$block7c3 = query($dbcon,"block7c2");
$block7c4 = query($dbcon,"block7c3");
$block7b1 = query($dbcon,"block7b");
$block7b2 = query($dbcon,"block7b1");
$block7b3 = query($dbcon,"block7b2");
$block7b4 = query($dbcon,"block7b3");
$block7a1 = query($dbcon,"block7a");
$block7a2 = query($dbcon,"block7a1");
$block7a3 = query($dbcon,"block7a2");
$block8c1 = query($dbcon,"block8c");
$block8c2 = query($dbcon,"block8c1");
$block8c3 = query($dbcon,"block8c2");
$block8c4 = query($dbcon,"block8c3");
$block8b1 = query($dbcon,"block8b");
$block8b2 = query($dbcon,"block8b1");
$block8a1 = query($dbcon,"block8a");
$block8a2 = query($dbcon,"block8a1");
$block8a3 = query($dbcon,"block8a2");
$block9 = query($dbcon,"block9");
$block9a = query($dbcon,"block9");
$block9b = query($dbcon,"block9");
$block9c = query($dbcon,"block9");
$block9d = query($dbcon,"block9");
$block10 = query($dbcon,"Block 10");
$block10a = query($dbcon,"Block 10");
for($i = 1 ; $i <= 11; $i++){
    $block10b[$i] = query($dbcon,"Block 10");
}
$block10c = query($dbcon,"Block 10");
$block10d = query($dbcon,"Block 10");
$block11 = query($dbcon,"block9");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="resource/bootstrap.min.css">
    <script src="resource/jquery.min.js"></script>
    <script src="resource/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <title>MAP</title>
</head>
<body id="body">
 
<div class="modal fade" role="document" id="info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
            <form method="get" action="../user/reservation.php">
            <!-- <form id="submit"> -->
                <div class="row">
                    <div class="col-md-3">
                        <strong>Block No.</strong>
                    </div>
                    <input type="hidden" value="" name="id" id="id123">
                    <div class="col-md-3">   
                    <input type="hidden" required class="form-control" name ="block_no" id="block_no" placeholder="Enter Name">
                    <h5 id="block_no_text"></h5>
                    </div>
                    <div class="col-md-3">
                        <strong>Lot No.</strong>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" required class="form-control" name ="lot_no" id="lot_no" placeholder="Enter Name">
                        <h5 id="lot_no_text"></h5>
                    </div>
                </div><hr>
                <div class="info">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Lot Price:</strong>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" required class="form-control" name ="price" id="price" placeholder="Enter Name">
                                <h5 id="lot_price"></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Date Reserve:</strong>
                        </div>
                        <div class="col-md-8">
                            <!--
                            <input type="date" required class="form-control" name ="date" id="date" >
                            -->
                            <?php echo date("Y-m-d");?>
                        </div>
                    </div><br>
                </div>
                    <div class="vacant" style="display:none"> 
                        <center> <h3><strong>VACANT</strong></h3></center>
                    </div>
                <div class="reserve" style="display:none">
                        <div class="row">
                            <div class="col-md-4">
                                <strong id="reserve">Reserve BY:</strong>
                            </div>
                            <div class="col-md-8">
                                <strong id="reserveby"></strong>
                                <!--
                                <input type="date" required class="form-control" name ="date" id="date" >
                                -->
                            </div>
                        </div><br>
                </div>
                <div class="reservation" style="display:none">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Payment Option:</strong>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="payment_option">
                                <option value="0">No Downpayment</option>
                                <option value="1">With Downpayment</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php if(!empty($_SESSION['login_user'])): ?>
                    <input type="submit" value="Next" class="btn btn-primary" id="save">
                <?php endif; ?>
                
                <!-- <input type="submit" value="save" class="btn btn-danger" > -->
               
                
                <input type="submit" value="Close" class="btn btn-danger" data-dismiss="modal">
               
            </div>
            </form>
        </div>
    </div>
</div>
 <div class="fixed" style="z-index:2;position:fixed;top:10px;left:30px;">
    <a href="../user/index.php" class="btn btn-primary">BACK</a>
</div>
<div class="bottomfixed" style="z-index:2;position:fixed;bottom:10px;right:20px">
    <div class="search" id="search" style="z-index:2;background-color:grey;cursor:pointer;border-radius:50%;width:50px;height:50px;border:1px solid black;">
        <center><span  class="fa fa-search" style="margin-top:16px;"></span></center>
    </div><br>
    <div class="search"  id="zoomin" style="z-index:2;background-color:grey;cursor:pointer;border-radius:50%;width:50px;height:50px;border:1px solid black;">
        <center><span class="fa fa-plus" style="margin-top:16px;"></span></center>
    </div><br>
    <div class="search"   id="zoomout" style="z-index:2;background-color:grey;cursor:pointer;border-radius:50%;width:50px;height:50px;border:1px solid black;">
        <center><span class="fa fa-minus" style="margin-top:16px;"></span></center>
    </div>
</div>
  <div class="content">
        <div class='top'>
            <ul>
                <?php
                    while($row = $block4->fetch_assoc()):
                        display($row['box_status'],$row['id'],"box",);
                    endwhile;
                ?>
            </ul>
        </div>
    <div class="mid1">
        <?php 
        for($x = 1 ; $x <= 29; $x++){ ?>
        <ul>
            <?php 
            if($x == 1){
                for($i = 0 ; $i <= 24 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
               mid($dbcon,5238,5239);
            }else if($x == 2){
                for($i = 0 ; $i <= 22 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5240,5243);
            }else if($x == 3){
                for($i = 0 ; $i <= 20 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5244,5249);
            }else if($x == 4){
                for($i = 0 ; $i <= 18 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5250,5257);
            }else if($x == 5){
                for($i = 0 ; $i <= 17 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5258,5266);
            }else if($x == 6){
                for($i = 0 ; $i <= 15 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5267,5277);
            }else if($x == 7){
                for($i = 0 ; $i <= 13 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5278,5290);
            }else if($x == 8){
                for($i = 0 ; $i <= 11 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5291,5305);
            }else if($x == 9){
                for($i = 0 ; $i <= 9 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5306,5322);
            }else if($x == 10){
                for($i = 0 ; $i <= 8 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5323,5340);
            }else if($x == 11){
                for($i = 0 ; $i <= 6 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5341,5360);
            }else if($x == 12){
                for($i = 0 ; $i <= 4 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5361,5382);
            }else if($x == 13){
                for($i = 1 ; $i <= 2 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5383,5407);
            }else if($x == 14){
               
                mid($dbcon,5408,5434);
            }else if($x == 15){
                for($i = 1 ; $i <= 2 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5601,5625);
            }else if($x == 16){
                for($i = 0 ; $i <= 4 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5579,5600);
            }else if($x == 17){
                for($i = 0 ; $i <= 5 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5558,5578);
            }else if($x == 18){
                for($i = 0 ; $i <= 7 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5539,5557);
            }else if($x == 19){
                for($i = 0 ; $i <= 9 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5522,5538);
            }else if($x == 20){
                for($i = 0 ; $i <= 10 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5506,5521);
            }else if($x == 21){
                for($i = 0 ; $i <= 12 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5493,5505);
            }else if($x == 22){
                for($i = 0 ; $i <= 13 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5479,5491);
            }else if($x == 23){
                for($i = 0 ; $i <= 15 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5468,5478);
            }else if($x == 24){
                for($i = 0 ; $i <= 17 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5459,5467);
            }else if($x == 25){
                for($i = 0 ; $i <= 18 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5451,5458);
            }else if($x == 26){
                for($i = 0 ; $i <= 20 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5445,5450);
            }else if($x == 27){
                for($i = 0 ; $i <= 21 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5440,5444);
            }else if($x == 28){
                for($i = 0 ; $i <= 23 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5437,5438);
            }else if($x == 29){
                for($i = 0 ; $i <= 24 ; $i++){
                    echo "<li   data-toggle='modal' data-target='#info' class='spacemid'></li>";
                }
                mid($dbcon,5435,5436);
            }
            
           
            ?>
        </ul>
    <?php } ?>
    </div>
    <div class="mid2">
    </div>
     <div class="bod">
      <div class='left'>
          <div class="block9">
            <ul>
                <?php 
                    while($row = $block5->fetch_assoc()):
                        display($row['box_status'],$row['id'],"box1",);
                    endwhile;
                ?>
                <li class="box-none"></li>
                <?php
                  while($row = $block6->fetch_assoc()):
                        display($row['box_status'],$row['id'],"box1",);
                 endwhile;
                ?>
            </ul>
          </div>
          <div class="peace">
                <ul class="first">
                    <?php
                        while($row = $block9->fetch_assoc()){
                            if($row['id']  >= 3256 && $row['id']  < 3275){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                    ?>
                   
                </ul>
                <ul class="second">
                    <?php 
                    while($row = $block9a->fetch_assoc()){
                        if($row['id'] >= 3275 && $row['id']  < 3294){
                             display($row['box_status'],$row['id'],"box3",);
                        }
                    }
                    ?>
                   <li class="space"></li>
                </ul>
               
                <ul class="third">
                    <?php 
                        while($row = $block9b->fetch_assoc()):
                            if($row['id']  >= 3294 && $row['id']  < 3945 +21 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        endwhile; 
                    ?>
                       
                </ul>
                <ul class="fourth">
                    <?php 
                     while($row = $block9c->fetch_assoc()):
                        if($row['id']  >= 3945 && $row['id']  < 3964 ){
                             display($row['box_status'],$row['id'],"box3",);
                        }
                    endwhile; 
                   ?>
                </ul>
                <ul class="fifth">
                    <?php
                     while($row = $block9d->fetch_assoc()):
                        if($row['id']  >= 3964 && $row['id']  <= 3982 ){
                             display($row['box_status'],$row['id'],"box3",);
                        }
                    endwhile; 
                   ?>
                   
                </ul>
          </div>
          <div class="faith">
                <ul class="first">
                    <?php
                        while($row = $block10->fetch_assoc()){
                            if($row['id']  >= 4525 && $row['id']  < 4537){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 30 ;$i++){
                            echo "<li class='space'></li>";
                        }
                    ?>
                </ul>
                <ul class="second">
                    <?php 
                      while($row = $block10a->fetch_assoc()){
                            if($row['id']  >= 4537 && $row['id']  < 4549){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                       
                        for($i = 1 ; $i <= 7 ;$i++){
                            echo "<li class='hidebox'></li>";
                        }
                        for($i = 1 ; $i <= 1 ;$i++){
                            echo "<li class='space'></li>";
                        }
                    ?>
                </ul>
              
                <ul class="third">
                <?php 
                $count = 0;
                $last = 0;
                      while($row = $block10b[1]->fetch_assoc()){
                            if($row['id']  >= 4549 && $row['id']  < 4563 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 7 ;$i++){
                            if($i <= 6){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[2]->fetch_assoc()){
                            if($row['id']  >= 4563 && $row['id']  < 4578 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 6 ;$i++){
                            if($i <= 5){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[3]->fetch_assoc()){
                            if($row['id']  >= 4578 && $row['id']  < 4593 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 6 ;$i++){
                            if($i <= 5){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[4]->fetch_assoc()){
                            if($row['id']  >= 4593 && $row['id']  < 4609 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 5 ;$i++){
                            if($i <= 4){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[5]->fetch_assoc()){
                            if($row['id']  >= 4609 && $row['id']  < 4626 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 4 ;$i++){
                            if($i <= 3){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[6]->fetch_assoc()){
                            if($row['id']  >= 4626 && $row['id']  < 4643 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 4 ;$i++){
                            if($i <= 3){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[7]->fetch_assoc()){
                            if($row['id']  >= 4643 && $row['id']  < 4661 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 3 ;$i++){
                            if($i <= 2){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[8]->fetch_assoc()){
                            if($row['id']  >= 4661 && $row['id']  < 4680 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 2 ;$i++){
                            if($i <= 1){
                            echo "<li class='hidebox'></li>";
                            }else{
                                echo "<li class='space'></li>";
                            }
                        }
                        while($row = $block10b[9]->fetch_assoc()){
                            if($row['id']  >= 4680 && $row['id']  < 4699 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 1 ; $i <= 2 ;$i++){
                            if($i <= 1){
                                echo "<li class='hidebox'></li>";
                                }else{
                                    echo "<li class='space'></li>";
                                }
                        }
                        while($row = $block10b[10]->fetch_assoc()){
                            if($row['id']  >= 4699 && $row['id']  < 4719 ){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                        for($i = 0 ; $i <= 1 ;$i++){
                                echo "<li class='space'></li>";
                        }
                      
                            while($row = $block10b[11]->fetch_assoc()){
                                if($row['id']  >= 4719 && $row['id']  < 5200 ){
                                     display($row['box_status'],$row['id'],"box3",);
                                }
                            }
                        
                    ?>
                       
                </ul>
                <ul class="fourth">
                    <?php
                        while($row = $block10c->fetch_assoc()){
                            if($row['id']  >= 5200 && $row['id']  <= 5219){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                    ?>
                </ul>
                <ul class="fifth">
                    <?php 
                      while($row = $block10d->fetch_assoc()){
                            if($row['id']  >= 5220 && $row['id']  <= 5237){
                                 display($row['box_status'],$row['id'],"box3",);
                            }
                        }
                    ?>
                </ul>
          </div>
          
          <div class="bottom">
                <div class="firstbottom">
                    <ul class="bottomul">
                        <?php 
                          while($row = $block7c1->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli",);
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="secondbottom">
                    <ul class="bottomul">
                    <?php
                            while($row = $block7c2->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                             endwhile;
                    ?>
                    </ul>
                </div>
                <div class="thirdbottom">
                    <ul class="bottomul">
                        <?php 
                          while($row = $block7c3->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="fourthbottom">
                    <ul class="bottomul">
                        <?php 
                          while($row = $block7c4->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
              <div class="fifthbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c1->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
               </div>
                <div class="sixthbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c2->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                  <div class="seventhbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c3->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="eightbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c4->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
          </div>
          <div class="bottomsecond">
                <div class="firstbottom">
                    <ul class="bottomul">
                        <?php
                            while($row = $block7b1->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="secondbottom">
                    <ul class="bottomul">
                        <?php
                        while($row = $block7b2->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="thirdbottom">
                    <ul class="bottomul">
                        <?php 
                        while($row = $block7b3->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="forthbottom">
                    <ul class="bottomul">
                        <?php 
                        while($row = $block7b4->fetch_assoc()):
                              display($row['box_status'],$row['id'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="fifthbottom">
                    <ul class="bottomul">
                        <?php 
                            while($row = $block7a1->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="sixthbottom">
                    <ul class="bottomul">
                        <?php 
                            while($row = $block7a2->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="seventhbottom">
                    <ul class="bottomul">
                        <?php 
                            while($row = $block7a3->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
          </div>
          <div class="bottomthird">
                <div class="firstbottom">
                <ul class="bottomul">
                    <?php 
                            while($row = $block8b1->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                            endwhile;
                        ?>
                        </ul>
                </div>
                <div class="secondbottom">
                    <ul class="bottomul">
                    <?php 
                            while($row = $block8b2->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="thirdbottom">
                    <ul class="bottomul">
                    <?php 
                            while($row = $block8a1->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="fourthbottom">
                    <ul class="bottomul">
                    <?php 
                            while($row = $block8a2->fetch_assoc()):
                                  display($row['box_status'],$row['id'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
          </div>
      </div>
   
      <div class='right'>
          <ul>
            <?php 
                while($row = $block1->fetch_assoc()):
                    display($row['box_status'],$row['id'],"box2");
                endwhile;
            ?>
          </ul>
      </div>
      <div class='rightthird'>
          <ul>
          <?php 
                while($row = $block2->fetch_assoc()):
                    display($row['box_status'],$row['id'],"box2third");
                endwhile;
            ?>
          </ul>
      </div>
      <div class='rightsecond row'>
        <ul class="first">
            <?php 
                while($row = $block21->fetch_assoc()):
                    display($row['box_status'],$row['id'],"box2second");
                endwhile;
            ?>
        </ul>
      </div>
      <div class='rightfourth'>
          <ul>
          <?php 
                while($row = $block3->fetch_assoc()):
                    display($row['box_status'],$row['id'],"box2fourth");
                endwhile;
            ?>
        </ul>
      </div>
      <div class='rightfifth row'>
          <ul>
            <?php 
                while($row = $block31->fetch_assoc()):
                    display($row['box_status'],$row['id'],"box2fifth");
                endwhile;
            ?>
           </ul>
      </div>
    </div>
</div>
           
<?php include'../assets/footer.php';?>
<script>
$(document).ready(function(){
    $("div .box").click(function(){
       var id = $(this).attr("id"); 
        data(id);
    })
    $("div .box1").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })
    $("div .box2").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

    $("div .boxbottomli").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

    $("div .box2second").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

    $("div .box2third").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

    $("div .box2fourth").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

    $("div .box2fifth").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

    $("div .box3").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

    $("div .boxmid").click(function(){
        var id = $(this).attr("id"); 
        data(id);
    })

   
    function data(id){
        $.ajax({
            url:"../admin/admin-data.php",
            method:"post",
            data: "id="+id,
            dataType:"JSON",
            success:function(data){
                console.log(data);
                $(this).hide();
                $("#lot_price").text(data['lot_price']);
                $("#block_no_text").text(data['block_no']);
                $("#lot_no_text").text(data['lot_no']);
                $("#price").val(data['lot_price1']);
                $("#block_no").val(data['block_no']);
                $("#lot_no").val(data['lot_no']);
                $("#id123").val(data['id']);
                var user = "<?php echo $_SESSION['FirstName'];?>";
                console.log(user);
                if(data['output'] == "success"){
                <?php if(!empty($_SESSION['login_user'])):?>
                  if(user === data['name']){
                    $(".reserve").show();
                    $("#reserveby").text(data['name']);
                    $("#save").hide();
                    $(".vacant").hide();
                    $(".reservation").hide();
                    $(".info").show();
                    $("#reserve").text("Reserve By:");
                   
                  }else{
                    $(".reserve").show();
                    $("#save").hide();
                    $(".vacant").hide();
                    $(".reservation").hide();
                    $(".info").hide();
                    $("#reserve").text("Reserved");
                    $("#reserveby").text("");
                  }
                <?php else: ?>
                    $(".reserve").show();
                    $("#reserveby").text(data['name']);
                    $("#save").hide();
                    $(".info").show();
                    $(".vacant").hide();
                    $("#reserve").text("Reserve By:");
                    $(".reservation").hide();
                <?php endif; ?>
                }else if(data['output'] == "admin"){
                    $(".vacant").show();
                    $(".reserve").hide();
                }else if(data['output'] == "user"){
                    $(".reservation").show();
                    $("#reserveby").text("");
                    $("#save").show();
                    $("#info").show();
                    $(".reserve").hide();
                    $(".vacant").hide();
                }
            }
        });
    }
    $("div #submit").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"update.php",
            data: new FormData(this),
            method:"post",
        //    dataType: "JSON",
           contentType: false,
           cache: false,
           processData: false,
            success:function(data){
                console.log(data);
                
            }
        })
    })
    var toast , message;
    
    $("#submit_form").on('submit',function(e){
        e.preventDefault();
        $.ajax({
           url:"../admin/admin-add.php",
           method:"post",
           data: new FormData(this),
        //    dataType: "JSON",
           contentType: false,
           cache: false,
           processData: false,
           success:function(data){
            if(data == "success"){
                message="Successfully Reserve";
                toast = "success";
                output(toast,message);
                console.log(data)
                // location.reload();
            }else{
                message= data;
                toast = "error";
                output(toast,message);
            }
           
           }
        })

    });

    function output(toast,message){
        $.toast({
                heading: 'Products',
                text: message,
                position: 'bottom-right',
                loaderBg: '#fff',
                icon: toast,
                hideAfter: 9000,
                stack: 6
           });
    }
var click = 0;
var result = 0;
var output = 0;
  $("#zoomin").click(function(){
      var class1 = document.getElementsByClassName('content');
        click += 1;
      result  = parseFloat(1) + parseFloat("."+click);
        $(class1).animate({ 'zoom':  result}, 400);
      
  })
  $("#zoomout").click(function(){
      var class1 = document.getElementsByClassName('content');
        click += 1;
        output = parseFloat(result) - parseFloat("."+click);
        $(class1).animate({ 'zoom':  output}, 400);
      
  })
 
})


</script>  
</body>
</html>