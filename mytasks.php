<?php
include "includes/db_con.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
<link rel="manifest" href="../favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JockTech EMS</title>



    <!-- <link rel="stylesheet"
    href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
    integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous" /> -->
    <link href="plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
include "pages/header.php"
?>


        <!-- page  begin content -->
        <div class="container-fluid">
            <?php
include "pages/nav-cards.php"
?>



            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                        <h6 class="m-0 font-weight-bold text-primary">My Tasks</h6>
                    </a>
                </div>
                <div class="collapse show" id="collapseCard">


                    <div class="card-body collapse show">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <button class="btn btn-success " data-toggle="modal" data-target="#UpdateTask"> <i class="fas fa-wrench"></i> Update Progress</button>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th>Task Name</th>
                                        <th>Task Description</th>
                                        <th>Date Assigned</th>
                                        <th>Dealine Date</th>
                                        <th>Progress</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

$id = $_SESSION['id'];
$getEmployees = "SELECT * FROM tbl_tasks where employee ='$id'";
$run = mysqli_query($conn, $getEmployees);
while ($row = mysqli_fetch_array($run)) {
    $task_name = $row['task_name'];
    $date = $row['task_date'];
    $end = $row['deadline'];
    $status = $row['status'];
    $progress = $row['progress'];
    $description = $row['description'];

    echo "

  <tr>
  <td>  $task_name </td>
  <td>   $description </td>
  <td>  $date </td>
  <td> $end </td>
  <td> $progress </td>

  <td> $status </td>

</tr>";
}

?>




                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>




            </div>




        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <script>
                            document.write(new Date().getFullYear());
                        </script> JockTech EMS</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->







        <!-- update task modal -->
  <!-- Modal -->
  <div class="modal fade" id="UpdateTask" tabindex="-1" role="dialog" aria-labelledby="task" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="task">Update Task Progress</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data">
          <div class="form-row">
            
           
            
            <div class="form-group col-md-6">
              <label for="inputState">Task Name</label>
              <select id="inputState" class="form-control" name="task_id" required>
              <option ></option>
                <?php
                $id = $_SESSION['id'];
                $stat = "inprogress";
                 $get_task = "SELECT * FROM tbl_tasks where employee ='$id' and status ='$stat'";
                 $run = mysqli_query($conn, $get_task);
                 while ($row = mysqli_fetch_array($run)) {
                     $task_id = $row['task_ID'];
                     $name = $row['task_name'];
                     
                     
                     echo "
                    
                     <option value='$task_id'>$name</option>
                     ";
                 }
                 ?>
              
           
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Progress %</label>
              <input type="number" class="form-control"  name="progress" placeholder="Task Progress" required>
            </div>
            
            
          </div>
        
         
          <div class="form-group">
           
          </div>
          <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
  


    </div>

    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>







    <!-- Bootstrap core JavaScript-->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="plugins/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/chart.js/Chart.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>

<?php
if(isset($_POST['update'])){
    $Task_id = $_POST['task_id'];
    $progress = $_POST['progress'];
   $stat ="inprogress";
   $value =100;
   $min =0;
   $query = "SELECT * FROM tbl_tasks WHERE  employee ='$id'  and task_ID ='$Task_id'";
   $run = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($run);
   $total = $row['progress'];
   $sum = $total + $progress;

   if($sum == $value){
       $stat = "Complete";
   }
   if ($progress <$min) {
       echo "<script>alert('No negative numbers are allowed')</script>";
    

       echo "<script>window.open('mytasks.php','_self')</script>";
   }
   else if($sum >$value){
    echo "<script>alert(' Large Percentage entered !!! Progress is currently at $total% and  can not exceed 100% please enter a valid percentage!')</script>";
    

    echo "<script>window.open('mytasks.php','_self')</script>";
   }

    else{

        $query = "UPDATE tbl_tasks SET progress ='$sum' ,status ='$stat' WHERE task_ID ='$Task_id'";
        $run = mysqli_query($conn,$query);
    
        
    
        if($run){
            echo "<script>alert('Task Progress Updated')</script>";
        
    
            echo "<script>window.open('mytasks.php','_self')</script>";
        }
        else{
            echo "<script>alert('Server Error! Could Not Update Task progress this time . Try again later')</script>";
            // mail($to_email,$subject,$message,$headers);
    
            echo "<script>window.open('mytasks.php','_self')</script>";
        }
    }

}


?>