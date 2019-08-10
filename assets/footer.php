<?php
$kweri = $dbcon->query("SELECT * FROM reservation 
    INNER JOIN map_box on map_box.id = reservation.map_id
    INNER JOIN accounts on accounts.ID = reservation.ID") or die(mysqli_error());
while($row = $kweri->fetch_assoc()){
  $dateReserve = strtotime($row['date_created']);
  $datetoday = strtotime(date("Y-m-d"));

  $diff = $datetoday - $dateReserve;
  $days = $diff / 86400;

  if($days > 30){
    $update = $dbcon->query("UPDATE reservation SET r_status = '2' WHERE reservation_id = '".$row['reservation_id']."'") or die(mysqli_error());
  }
?>

<?php 
  }
?>






  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 .</strong> All rights reserved.
  </footer>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../toast/js/jquery.toast.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>