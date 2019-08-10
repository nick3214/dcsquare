  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../image/DC logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DC Square</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
             Dashboard
            </a>
          </li>
<?php if($_SESSION['UserRole'] == '0'):?>
  <li class="nav-item">
            <a href="reservation.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Reservations
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Accounts
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="customer.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Customer Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Administrator Account</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
                File Manager
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../map/index.php" target="_blank" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Location Map Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="map-category.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Map Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="map-color.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Map Color Pricing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="customer.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Contract</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="contact.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Contact Details</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Transactions
              </p>
            </a>
          </li>
<?php endif;?>
<?php if($_SESSION['UserRole'] == '1'):?>
          <li class="nav-item">
            <a href="myreservation.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Reservation    
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="mytransaction.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                My Transactions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../map/index.php" class="nav-link">
              <i class="nav-icon fa fa-map"></i>
              <p>
                Maps
              </p>
            </a>
          </li>
<?php endif;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>