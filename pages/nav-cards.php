

<?php
include("functions/functions.php"); 
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> DownloadReport</a> -->
  </div>


   <!-- Content Row -->
   <div class="row">

   

    
    <!-- Task Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                <?php getTasksNumber(); ?>
                </div>
               
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Leave Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Leave days remaining</div>
              <?php
                   $id = $_SESSION['id'];
  
                   $getCount = "SELECT * FROM tbl_leave where emp_id ='$id'";
                   $run = mysqli_query($conn,$getCount);
                   $count = mysqli_num_rows($run);
                   $row = mysqli_fetch_array($run);
                  
                   $value=0 ;
                   

                   if($count >0){
                    $number  = $row['leave_days'];
                    echo '
                    
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$number.'</div>';
                  
                  }
                  else{
                    // if($number == "null"){
                    //   $value = 21;
                    //   echo ' <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$number.' </div>';
                    // }
                    echo '
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> 21 </div>
                    ';

                  }
              ?>
              

             
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

     <!-- Content Row -->