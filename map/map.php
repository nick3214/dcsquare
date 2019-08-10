<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';


  function display($status,$block_no,$lot_no,$class){
    if($status == 1):
        echo "<li class='$class' style='background-color:red'name='".$block_no."' id='".$lot_no."' data-toggle='modal' data-target='#info'></li>";
    else:
        echo "<li class='$class'name='".$block_no."' id='".$lot_no."' data-toggle='modal' data-target='#info'></li>";
    endif;
  }

 
$block1 = $dbcon->query("select * from map_box where block_no='block1'");
$block2 = $dbcon->query("select * from map_box where block_no='block2'");
$block21 = $dbcon->query("select * from map_box where block_no='block21'");
$block3 = $dbcon->query("select * from map_box where block_no='block3'");
$block31 = $dbcon->query("select * from map_box where block_no='block31'");
$block4 = $dbcon->query("select * from map_box where block_no='block4'");
$block5 = $dbcon->query("select * from map_box where block_no='block5'");
$block6 = $dbcon->query("select * from map_box where block_no='block6'");
$block7c1 = $dbcon->query("select * from map_box where block_no='block7c'");
$block7c2 = $dbcon->query("select * from map_box where block_no='block7c1'");
$block7c3 = $dbcon->query("select * from map_box where block_no='block7c2'");
$block7c4 = $dbcon->query("select * from map_box where block_no='block7c3'");
$block7b1 = $dbcon->query("select * from map_box where block_no='block7b'");
$block7b2 = $dbcon->query("select * from map_box where block_no='block7b1'");
$block7b3 = $dbcon->query("select * from map_box where block_no='block7b2'");
$block7b4 = $dbcon->query("select * from map_box where block_no='block7b3'");
$block7a1 = $dbcon->query("select * from map_box where block_no='block7a'");
$block7a2 = $dbcon->query("select * from map_box where block_no='block7a1'");
$block7a3 = $dbcon->query("select * from map_box where block_no='block7a2'");
$block8c1 = $dbcon->query("select * from map_box where block_no='block8c'");
$block8c2 = $dbcon->query("select * from map_box where block_no='block8c1'");
$block8c3 = $dbcon->query("select * from map_box where block_no='block8c2'");
$block8c4 = $dbcon->query("select * from map_box where block_no='block8c3'");
$block8b1 = $dbcon->query("select * from map_box where block_no='block8b'");
$block8b2 = $dbcon->query("select * from map_box where block_no='block8b1'");
$block8a1 = $dbcon->query("select * from map_box where block_no='block8a'");
$block8a2 = $dbcon->query("select * from map_box where block_no='block8a1'");
$block8a3 = $dbcon->query("select * from map_box where block_no='block8a2'");
$block9 = $dbcon->query("select * from map_box where block_no='block9'");
$block9a = $dbcon->query("select * from map_box where block_no='block9'");
$block9b = $dbcon->query("select * from map_box where block_no='block9'");
$block9c = $dbcon->query("select * from map_box where block_no='block9'");
$block9d = $dbcon->query("select * from map_box where block_no='block9'");
$block10 = $dbcon->query("select * from map_box where block_no='block10'");
$block10a = $dbcon->query("select * from map_box where block_no='block10'");
$block10b = $dbcon->query("select * from map_box where block_no='block10'");
$block10c = $dbcon->query("select * from map_box where block_no='block10'");
$block10d = $dbcon->query("select * from map_box where block_no='block10'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <title>MAP</title>
</head>
<body id="body">
 
<div class="modal fade" role="document" id="info1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Information</div>
            <div class="modal-body">
            <form method="post" id="submit_form">
                <div class="row">
                    <div class="col-md-3">
                        Block No.
                    </div>
                    <div class="col-md-3">   
                    <input type="hidden" required class="form-control" name ="block_no" id="block_no" placeholder="Enter Name">
                    <h5 id="block_no_text"></h5>
                    </div>
                    <div class="col-md-3">
                            Lot No.
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" required class="form-control" name ="lot_no" id="lot_no" placeholder="Enter Name">
                        <h5 id="lot_no_text"></h5>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                            Date Reserve
                    </div>
                    <div class="col-md-8">
                        <input type="date" required class="form-control" name ="date" id="date" placeholder="Enter Name">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                           No. Of Years
                    </div>
                    <div class="col-md-8">
                        <input type="number" required class="form-control" name ="years" id="years" placeholder="Enter Name">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php if(!empty($_SESSION['login_user'])): ?>
                    <input type="submit" value="Reserve" class="btn btn-primary" id="save">
                <?php endif; ?>
                <input type="submit" value="Close" class="btn btn-danger" data-dismiss="modal">
            </div>
            </form>
        </div>
    </div>
</div>
 <div class="fixed" style="position:fixed;top:10px;left:30px;">
    <a href="../user/index.php" class="btn btn-primary">BACK</a>
</div>
<div class="bottomfixed" style="z-index:2;position:fixed;bottom:10px;right:20px">
    <div class="search" style="z-index:2;background-color:grey;cursor:pointer;border-radius:50%;width:50px;height:50px;border:1px solid black;">
        <center><span  class="fa fa-search" style="margin-top:16px;"></span></center>
    </div><br>
    <div class="search" style="z-index:2;background-color:grey;cursor:pointer;border-radius:50%;width:50px;height:50px;border:1px solid black;">
        <center><span class="fa fa-plus" style="margin-top:16px;"></span></center>
    </div><br>
    <div class="search" style="z-index:2;background-color:grey;cursor:pointer;border-radius:50%;width:50px;height:50px;border:1px solid black;">
        <center><span class="fa fa-minus" style="margin-top:16px;"></span></center>
    </div>
</div>
  <div class="content">
        <div class='top'>
            <ul>
                <?php
                    while($row = $block4->fetch_assoc()):
                            if($row['box_status'] == 1):
                                echo "<li class='box' style='background-color:red'name='".$row['lot_no']."' id='".$row['block_no']."'  data-toggle='modal' data-target='#info'></li>";
                            elseif($row['box_status'] == 2):
                                echo "<li class='box' style='background-color:orange'name='".$row['lot_no']."' id='".$row['block_no']."'  data-toggle='modal' data-target='#info'></li>";
                            else:
                                echo "<li class='box'name='".$row['lot_no']."' id='".$row['block_no']."'  data-toggle='modal' data-target='#info'></li>";
                            endif;
                    endwhile;
                ?>
            </ul>
        </div>
        <div class="mid">
        <ul>
                <?php for($i = 1 ; $i <= 20 ; $i++){
                    echo "<li class='boxmid'></li>";
                }?>
            </ul>
        </div>
     <div class="bod">
      <div class='left'>
          <div class="block9">
            <ul>
                <?php 
                    while($row = $block5->fetch_assoc()):
                        display($row['box_status'],$row['block_no'],$row['lot_no'],"box1");
                    endwhile;
                ?>
                <li class="box-none"></li>
                <?php
                  while($row = $block6->fetch_assoc()):
                        display($row['box_status'],$row['block_no'],$row['lot_no'],"box1");
                 endwhile;
                ?>
            </ul>
          </div>
          <div class="peace">
                <ul class="first">
                    <?php
                        while($row = $block9->fetch_assoc()){
                            if($row['id']  >= 3256 && $row['id']  < 3275){
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"box3");
                            }
                        }
                    ?>
                   
                </ul>
                <ul class="second">
                    <?php 
                    while($row = $block9a->fetch_assoc()){
                        if($row['id'] >= 3275 && $row['id']  < 3294){
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"box3");
                        }
                    }
                    ?>
                   <li class="space"></li>
                </ul>
               <?php for($x = 1 ; $x <= 31; $x++){ ?>
                <ul class="third">
                    <?php 
                        while($row = $block9b->fetch_assoc()):
                            if($row['id']  >= 3294 && $row['id']  < 3945 +21 ){
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"box3");
                            }
                        endwhile; 
                    ?>
                       
                </ul>
                <?php } ?>
                <ul class="fourth">
                    <?php 
                     while($row = $block9c->fetch_assoc()):
                        if($row['id']  >= 3945 && $row['id']  < 3964 ){
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"box3");
                        }
                    endwhile; 
                   ?>
                </ul>
                <ul class="fifth">
                    <?php
                     while($row = $block9d->fetch_assoc()):
                        if($row['id']  >= 3964 && $row['id']  <= 3982 ){
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"box3");
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
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"box3");
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
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"box3");
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
               <?php for($x = 1 ; $x <= 31; $x++){ ?>
                <ul class="third">
                <?php 
                      while($row = $block10b->fetch_assoc()){
                            if($row['id']  >= 4549 && $row['id']  < 4563){
                                if($row['box_status'] == 1):
                                    echo "<li class='box3' style='background-color:red'name='".$row['lot_no']."' id='".$row['block_no']."' data-toggle='modal' data-target='#info'></li>";
                                else:
                                    echo "<li class='box3'name='".$row['lot_no']."' id='".$row['block_no']."' data-toggle='modal' data-target='#info'></li>";
                                endif;
                            }else if($row['id']  >= 4563 && $row['id']  < 4577){
                                if($row['box_status'] == 1):
                                    echo "<li class='box3' style='background-color:red'name='".$row['lot_no']."' id='".$row['block_no']."' data-toggle='modal' data-target='#info'></li>";
                                else:
                                    echo "<li class='box3'name='".$row['lot_no']."' id='".$row['block_no']."' data-toggle='modal' data-target='#info'></li>";
                                endif;
                            }
                        }
                    ?>
                       
                </ul>
                <?php } ?>
                <ul class="fourth">
                    <?php 
                   
                   ?>
                </ul>
                <ul class="fifth">
                    <?php
                   
                   ?>
                </ul>
          </div>
          
          <div class="bottom">
                <div class="firstbottom">
                    <ul class="bottomul">
                        <?php 
                          while($row = $block7c1->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="secondbottom">
                    <ul class="bottomul">
                    <?php
                            while($row = $block7c2->fetch_assoc()):
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                             endwhile;
                    ?>
                    </ul>
                </div>
                <div class="thirdbottom">
                    <ul class="bottomul">
                        <?php 
                          while($row = $block7c3->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="fourthbottom">
                    <ul class="bottomul">
                        <?php 
                          while($row = $block7c4->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
              <div class="fifthbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c1->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
               </div>
                <div class="sixthbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c2->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                  <div class="seventhbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c3->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="eightbottom">
                    <ul class="bottomul">
                    <?php 
                          while($row = $block8c4->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
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
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="secondbottom">
                    <ul class="bottomul">
                        <?php
                        while($row = $block7b2->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="thirdbottom">
                    <ul class="bottomul">
                        <?php 
                        while($row = $block7b3->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="forthbottom">
                    <ul class="bottomul">
                        <?php 
                        while($row = $block7b4->fetch_assoc()):
                            display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                        endwhile;
                        ?>
                    </ul>
                </div>
                <div class="fifthbottom">
                    <ul class="bottomul">
                        <?php 
                            while($row = $block7a1->fetch_assoc()):
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="sixthbottom">
                    <ul class="bottomul">
                        <?php 
                            while($row = $block7a2->fetch_assoc()):
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="seventhbottom">
                    <ul class="bottomul">
                        <?php 
                            while($row = $block7a3->fetch_assoc()):
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
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
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                            endwhile;
                        ?>
                        </ul>
                </div>
                <div class="secondbottom">
                    <ul class="bottomul">
                    <?php 
                            while($row = $block8b2->fetch_assoc()):
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="thirdbottom">
                    <ul class="bottomul">
                    <?php 
                            while($row = $block8a1->fetch_assoc()):
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
                            endwhile;
                        ?>
                    </ul>
                </div>
                <div class="fourthbottom">
                    <ul class="bottomul">
                    <?php 
                            while($row = $block8a2->fetch_assoc()):
                                display($row['box_status'],$row['block_no'],$row['lot_no'],"boxbottomli");
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
                    display($row['box_status'],$row['block_no'],$row['lot_no'],"box2");
                endwhile;
            ?>
          </ul>
      </div>
      <div class='rightthird'>
          <ul>
          <?php 
                while($row = $block2->fetch_assoc()):
                    display($row['box_status'],$row['block_no'],$row['lot_no'],"box2third");
                endwhile;
            ?>
          </ul>
      </div>
      <div class='rightsecond row'>
        <ul class="first">
            <?php 
                while($row = $block21->fetch_assoc()):
                    display($row['box_status'],$row['block_no'],$row['lot_no'],"box2second");
                endwhile;
            ?>
        </ul>
      </div>
      <div class='rightfourth'>
          <ul>
          <?php 
                while($row = $block3->fetch_assoc()):
                    display($row['box_status'],$row['block_no'],$row['lot_no'],"box2fourth");
                endwhile;
            ?>
        </ul>
      </div>
      <div class='rightfifth row'>
          <ul>
            <?php 
                while($row = $block31->fetch_assoc()):
                    display($row['box_status'],$row['block_no'],$row['lot_no'],"box2fifth");
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
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })
    $("div .box1").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })
    $("div .box2").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })

    $("div .boxbottomli").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })

    $("div .box2second").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })

    $("div .box2third").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })

    $("div .box2fourth").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
        $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })

    $("div .box2fifth").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })

    $("div .box3").click(function(){
       var lot_no = $(this).attr("name");
       var block_no = $(this).attr("id"); 
        $("#lot_no_text").text(lot_no);
        $("#block_no_text").text(block_no);
         $("#block_no").val(block_no);
        $("#lot_no").val(lot_no);
        data(block_no,lot_no);
    })

   
    function data(block_no,lot_no){
        $.ajax({
            url:"../admin/admin-data.php",
            method:"post",
            data: "block_no="+block_no+"&lot_no="+lot_no,
            dataType:"JSON",
            success:function(data){
               if(data['output'] == "success"){
                    $("#date").attr("type","text");
                    $("#name").val(data['name']);
                    $("#age").val(data['age']);
                    $("#date").val(data['date']);
                    $("#years").val(data['years']);   
                    $("#name").prop("disabled",true);
                    $("#age").prop("disabled",true);
                    $("#date").prop("disabled",true);
                    $("#years").prop("disabled",true);
                    $("#save").hide();
               }else{
                $("#date").attr("type","text");
                    $("#name").val("");
                    $("#age").val("");
                    $("#date").attr("type","date");
                    $("#date").val("");
                    $("#years").val("");   
                    $("#name").prop("disabled",false);
                    $("#age").prop("disabled",false);
                    $("#date").prop("disabled",false);
                    $("#years").prop("disabled",false);
                    // $("#save").hide();
               }
            }
        });
    }
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
})
</script>  
</body>
</html>