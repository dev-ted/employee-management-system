
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="apple-touch-icon" sizes="57x57" href="../favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicons/favicon-16x16.png">
<link rel="manifest" href="../favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JockTech EMS</title>
    

<!-- <link rel="stylesheet"
    href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
    integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous" /> -->
    <link href="../plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
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
                <h6 class="m-0 font-weight-bold text-primary">Team Sheet Management</h6>
              </a>
        </div>
        <div class="collapse show" id="collapseCard">
          
            <div class="card-body collapse show">

         <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Time sheet</h1>
      <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <form action="Timesheet.inc.php" method="post">
  <div class="form-row">
  <div class="form-group col-md-4">
              <label for="inputState">Employee</label>
              <select id="inputState" class="form-control" name="name" required>
                <option selected>Choose...</option>
                <?php

                
                 $get_emp = "SELECT * FROM  tbl_employee";
                 $run = mysqli_query($conn, $get_emp);
                 while ($row = mysqli_fetch_array($run)) {
                     $emp_id = $row['emp_ID'];
                     $name = $row['Name'];
                    
                     $surname = $row['surname'];
                     $email = $row['EMAIL_ADDRESS'];
                     $Display_name = $name." ".$surname;
                     
                     echo "
                    
                     <option value='$emp_id'>$Display_name</option>
                     ";
                   
                 }

                
                 
                 ?>
                 
                
                
              </select>
            </div>
 
    <div class="form-group col-md-4">
      <label for="inputPassword4">Date</label>
      <input type="date" class="form-control" name="date" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Start Time</label>
      <input type="time" class="form-control" name="start_time" required>
    </div>
 
    <div class="form-group col-md-4">
      <label for="inputPassword4">End Time</label>
      <input type="time" class="form-control" name="end_time" required>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Over time(Hours)</label>
      <input type="number" class="form-control" name="overtime"  required>
    </div>
  
  </div>
  <div class="form-group">
  
  </div>
  <button type="submit"  name="create" class="btn btn-primary">Create</button>
</form>
               
              </div>
        </div>
        
      </div>
     


<div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#collapseCards" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                <h6 class="m-0 font-weight-bold text-primary">Employee Timesheet</h6>
              </a>
        </div>
        <div class="collapse show  " id="collapseCards">
          
            <div class="card-body collapse show">
              <form method="POST">
              <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputState">Employee</label>
              <select id="inputState" class="form-control" name="name" required>
                <option ></option>
                <?php
                 $get_emp = "SELECT * FROM  tbl_employee";
                 $run = mysqli_query($conn, $get_emp);
                 while ($row = mysqli_fetch_array($run)) {
                     $emp_id = $row['emp_ID'];
                     $name = $row['Name'];
                     $surname = $row['surname'];
                     $email = $row['EMAIL_ADDRESS'];
                     $Display_name = $name." ".$surname;
                     
                     echo "<option value='$emp_id'>$Display_name</option>
                     ";               
                 }

                 ?>

              </select>
            </div>

        </div>
        <div class="form-group col-md-2">

        <button class="btn btn-success " name="view"> <i class="fas fa-check-circle"></i>View</button>
        </div>
              </form>
           
      <?php
          if (isset($_POST['view'])) {
              $id = $_POST['name'];
              echo '<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>start</th>
                  <th>end</th>
                  
                  <th>Regular hours</th>
                  <th>Overtime (Hours)</th>
                  <th>Total Hours Worked</th>
                </tr>
              </thead>
             
               '; ?>
              <?php

  
$getIncreaseRequests = "SELECT * FROM tbl_timesheet where emp_ID='$id'";
              $run = mysqli_query($conn, $getIncreaseRequests);
              while ($row = mysqli_fetch_array($run)) {
                  $startdate = $row['Date'];
                  $start = $row['Start_Time'];
                  $end = $row['Finish_Time'];
                  $regular = $row['Regular_Hours'];
                  $overtime = $row['Overtime_Hours'];
                  $total = $row['Totalworked_hours'];

                  
              echo "
              <tbody>
             
              <tr>
              
              <td>   $startdate </td>
              <td>   $start </td>
              <td>   $end </td>
              <td>   $regular hrs </td>
              <td>   $overtime hrs </td>
              <td>   $total hrs </td>
             
              
              
              </tr>";
              }
          

          }
?>
         

               
              </tbody>
            </table>
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
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../plugins/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../plugins/chart.js/Chart.bundle.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/chart.js/Chart.bundle.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>

