<?php
include("includes/db_con.php");
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
include("pages/header.php")
?>
    

        <!-- page  begin content -->
        <div class="container-fluid">
        <?php
include("pages/nav-cards.php")
?>
  
  

  <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                <h6 class="m-0 font-weight-bold text-primary">My Timesheet</h6>
              </a>
        </div>
        <div class="collapse show" id="collapseCard">
          
            <div class="card-body collapse show">
            <div class="table-responsive">
              
              <h5 class="font-weight-bold text-primary"><?php echo $_SESSION['user']; ?></h5>
             
          
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>

                  <th>Date</th>
                  <th>Shift start</th>
                  <th>Shift ends</th>
                  <th>Regular Hours Worked</th>
                  <th>Overtime</th>

                  <th>Total Hours worked</th>
                  
                  
                </tr>
              </thead>
             
              <tbody>
              <?php

        $id = $_SESSION['id'];



$getEmployees = "SELECT * FROM tbl_timesheet where emp_id ='$id'";
$run = mysqli_query($conn,$getEmployees);
while($row = mysqli_fetch_array($run)){
  
  $date = $row['Date'];
  $total_hours = $row['Totalworked_hours'];
  $start = $row['Start_Time']; 
  $end = $row['Finish_Time'];
  $regular_hours =$row['Regular_Hours'];
  $overtime =$row['Overtime_Hours'];
  

  echo "
  
  <tr>
  
  <td>   $date </td>
  <td>  $start </td>
  <td> $end </td>
  <td> $regular_hours hrs </td>
  <td> $overtime hrs</td>
  <td> $total_hours hrs </td>
  
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
          </script>  JockTech EMS</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->






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

