

<?php
include("includes/db_con.php");
session_start();

?>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <!-- <i class="fas fa-laugh-wink"></i> -->
  </div>
 
  <div class="sidebar-brand-text mx-3">JockTech EMS </sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="Dashboard.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-door-open"></i>
    <span>Leave</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Manage Employees:</h6>
      <a  type="button"  class="collapse-item btn-success" data-toggle="modal" data-target="#AddEmployee"> New Employee</a> -->
     
      <a class="collapse-item  btn-success" href="leave.php">Leave Application</a>
       <a class="collapse-item  btn-primary" href="track.php">Track progress</a>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSalary" aria-expanded="true" aria-controls="collapseSalary">
    <i class="fas fa-fw fa-money-check"></i>
    <span>salary requests</span>
  </a>
  <div id="collapseSalary" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Manage Employees:</h6>
      <a  type="button"  class="collapse-item btn-success" data-toggle="modal" data-target="#AddEmployee"> New Employee</a> -->
     
      <a class="collapse-item  btn-warning" href="increase.php">Increase Application</a>
       <a class="collapse-item  btn-success" href="Progress.php">Track Progress</a>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
    <i class="fas fa-fw fa-clock"></i>
    <span>View Timesheet</span>
  </a>
  <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">View Timesheet:</h6>
      <a class="collapse-item btn-success" href="timesheet.php"> My timesheet</a>
     
     
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="true" aria-controls="collapseLeave">
    <i class="fas fa-fw fa-file-alt"></i>
    <span>Reports</span>
  </a>
  <div id="collapseLeave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">My reports:</h6>
      <a class="collapse-item" href="report.php"> Perfomance report</a>
     
      
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotice" aria-expanded="true" aria-controls="collapseNotice">
    <i class="fas fa-fw fa-flag"></i>
    <span>Notices</span>
  </a>
  <div id="collapseNotice" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Manage Utilities:</h6>
      
     
      <a class="collapse-item" href="meetings.php">Meetings</a>
      <a class="collapse-item" href="mytasks.php">Tasks</a>
      <a class="collapse-item" href="register.php">Change Password</a>
      
    </div>
  </div>
</li>


<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- content wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<div id="content">
   <!-- Topbar -->
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
   

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">



        <!-- Nav Item - Messages -->
      <li class="nav-item dropdown no-arrow mx-1">

   
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <?php
  $id = $_SESSION['id'];
    $getNotifications = "SELECT * FROM emp_notifications where emp_id ='$id'";
  $run = mysqli_query($conn, $getNotifications);
  $count = mysqli_num_rows($run);
  if ($count==0) {
      echo ' <span class="badge badge-danger badge-counter">0</span>';
  } else {
      echo ' <span class="badge badge-danger badge-counter">'.$count.'</span>
    </a>';
  }
      ?>
          
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">
            Message Center
          </h6>
          <?php
          while($row = mysqli_fetch_array($run)){
            $content = $row['content'];
            $date = $row['date'];
            $admin = $row['admin'];
            echo ' <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="images/logo.png" alt="">
              <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
              <div class="text-truncate">'.$content.'</div>
              <div class="small text-gray-500">'.$admin.'   '.$date.'</div>
            </div>
          </a>
        ';
          

          }
          ?>
        
       
       
         
          
        </div>
      </li>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="profile.php?id=<?php echo $_SESSION['id'] ;?>" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php if (isset($_SESSION['user'])) {
          echo $_SESSION['user'] ;
      } ?>
      </span>
          <img class="img-profile rounded-circle img-fluid" src="images/logo.png">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['id'] ;?> ">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <!-- <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a> -->
          
          <div class="dropdown-divider"></div>
         
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
         
         
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->

 


  
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form action="logout.inc.php">
        <a  type="button" class="btn btn-primary" href="logout.inc.php">Logout</a>
        </form>
      </div>
    </div>
  </div>
</div>


