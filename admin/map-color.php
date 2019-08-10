<?php 
  include'../config/db.php';
  include'../config/functions.php';
  include'../config/main_function.php';
  if(empty($_SESSION['login_admin'])){
    header("Location: ../index.php");
    exit;
  }
$color = fetchAll("*","map_color");
?>
<?php include'../assets/header.php';?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
<?php include'../assets/nav.php';?>
<?php include'../assets/sidebar.php'?>
<?php foreach ($color as $key => $value): ?>
<div class="modal fade" role="document" id="update_color<?php echo $value->id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Color Pricing</div>
            <div class="modal-body">
                <form method="post" id="submit_form">
                <div class="row">
                    <input type="hidden" value="<?php echo $value->id;?>" name="id" id="id">
                    <div class="col-md-4">Color</div>
                    <div class="col-md-8"><input type="text" class="form-control" readonly value="<?php echo $value->map_color;?>" id="name"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Price</div>
                    <div class="col-md-8"><input type="number" min="0" name="price" class="form-control" value="<?php echo $value->map_price;?>" id="price"></div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save" id="save">
                <input type="submit" class="btn btn-danger" value="Close" data-dismiss="modal">
            </div>
</form>
        </div>
    </div>
</div>
<?php endforeach; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fa fa-map"></i> Map Category</h1>
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
              <div class="card-body">
                
<?php if(!empty($color)):?>   
 <table id="example1" class="table table-bordered table-hover" style="font-size:13px;">
                <thead>
                <tr>
                  <th>Color</th>
                  <th>Color Price</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
<?php foreach ($color as $key => $value):?>
                <tr>
                  <td>
                    <?php echo $value->map_color?> - 
                    <?php 
                    if($value->map_color == 'Yellow'){
                      echo 'Premium';
                    }elseif($value->map_color == 'Green'){
                      echo 'Everlasting';
                    }else{  
                      echo 'Prestige';
                    }
                    ?>    
                  </td>
                  <td>  &#8369; <?php echo number_format($value->map_price,2)?></td>
                  <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" style="padding:8px;">       
      <li>
      <a href="#" data-target="#update_color<?php echo $value->id;?>" data-toggle="modal"><i class="fa fa-edit"></i> Update</a>
      </li>

                      

                    </ul>
                  </div>
                    
                  </td>
                </tr>
<?php endforeach;?>
              </tbody>
</table>
<?php else:?>
  <div class="alert alert-danger">No Records on database.</div>
<?php endif;?>
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->

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
    $(document).ready(function(){
        $("div #submit_form").submit(function(e){
           e.preventDefault();
            $.ajax({
                url:"update_price.php",
                data: new FormData(this),
                method:"post",
        //    dataType: "JSON",
           contentType: false,
           cache: false,
           processData: false,
                success:function(data){
                    if(data == "success"){
                        alert("Update Successfully");
                        location.reload();
                    }else{
                        console.log(data);
                    }
                }
            })
        })
    })
</script>
</body>
</html>
