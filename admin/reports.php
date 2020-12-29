<?php
include("../includes/db_con.php");
?>
<link rel="apple-touch-icon" sizes="57x57" href="../favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="../favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicons/favicon-16x16.png">
<link rel="manifest" href="../favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!DOCTYPE html>
<html lang="en">

<head>
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



      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Reports</h1>
      <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Report Name</label>
              <input type="text" class="form-control" name="reportname" placeholder="Report Name">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Employee</label>
              <select class="form-control" name="employee" required>
                <option></option>
                <?php
                $get_emp = "SELECT * FROM  tbl_employee";
                $run = mysqli_query($conn, $get_emp);
                while ($row = mysqli_fetch_array($run)) {
                  $emp_id = $row['emp_ID'];
                  $name = $row['Name'];
                  $surname = $row['surname'];

                  $Display_name = $name . " " . $surname;

                  echo "<option value='$emp_id'>$Display_name</option>
                     ";
                }

                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Goals</label>
              <textarea class="form-control" name="goals" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label>Improvement Areas</label>
              <textarea class="form-control" name="areas" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label>Comments</label>
              <textarea class="form-control" name="comments" rows="3"></textarea>
            </div>
            <div class="col-md-8">
              <button type="submit" name="create" class="btn btn-primary">Create</button>
            </div>

          </form>
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


<?php
if (isset($_POST['create'])) {
  $reportname = $_POST['reportname'];
  $employeID = $_POST['employee'];
  $goals = $_POST['goals'];
  $areasToImprove = $_POST['areas'];
  $comments = $_POST['comments'];
  $content = "New Report available";
  $today = date("F j, Y, g:i a");
    $admin = $_SESSION['user'];


  $get_Employee = "SELECT * FROM tbl_employee WHERE emp_ID ='$employeID'";
  $run = mysqli_query($conn,$get_Employee);
  $row =  mysqli_fetch_array($run);
  $name = $row['Name'];
  $surname = $row['surname'];
  $position = $row['position'];

  $insert = "INSERT INTO tbl_report(Report_name,Emp_Name,emp_surname,position,Goals,improvement_area,Comments,emp_ID) values('$reportname','$name','$surname','$position','$goals','$areasToImprove','$comments','$employeID')";
  $run_insert = mysqli_query($conn,$insert);
  if(!$run_insert){
    echo "<script>alert('Server error! please try again later')</script>";
    echo "<script>window.open('reports.php','_self')</script>";
  }
  else{
    $insert_notification = "INSERT INTO emp_notifications(content,date,emp_id,admin) values('$content','$today','$employeID','$admin')";
    $run = mysqli_query($conn,$insert_notification);
    echo "<script>alert('New report has been been created')</script>";
      echo "<script>window.open('reports.php','_self')</script>";
  }
}

?>