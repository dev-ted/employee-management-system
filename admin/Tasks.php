<?php
include("../includes/db_con.php");
?>
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
  <link rel="icon" type="image/png" sizes="192x192" href="../favicons/android-icon-192x192.png">
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
            <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
          </a>
        </div>
        <div class="collapse show" id="collapseCard">
          <div class="card-body collapse show">

            <section class="form-row">
              <div class="form-group col-md-2">

                <input type="date" name="first_name" class="form-control">
              </div>
              <div class="form-group col-md-2">

                <button type="button" class="btn btn-primary  form-control" data-toggle="modal" data-target="#AddTask">Add new Task</button>
              </div>
            </section>

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Task Name</th>
                    <th>Date</th>

                    <th>Deadline</th>
                    <th>Duration</th>
                    <th>Assigned To</th>
                    <th>Description</th>

                  </tr>
                </thead>

                <tbody>
                  <?php


                  $getEmpID = "SELECT * FROM tbl_employee";
                  $run = mysqli_query($conn, $getEmpID);
                  while ($row = mysqli_fetch_array($run)) {
                    $id = $row['emp_ID'];
                    $name = $row['Name'];
                    $surname = $row['surname'];

                    $getTasks = "SELECT * FROM tbl_tasks WHERE employee = '$id'";
                    $run_task = mysqli_query($conn, $getTasks);



                    while ($row = mysqli_fetch_array($run_task)) {
                      $taskname = $row['task_name'];
                      $startdate = $row['task_date'];
                      $deadline = $row['deadline'];
                      $duration = $row['duration'];
                      $assigned_to = $name . " " . $surname;
                      $description = $row['description'];



                      echo "
  
  <tr>
  <td>  $taskname </td>
  <td>   $startdate </td>
  <td>  $deadline </td>
  <td> $duration  Days </td>
  <td>  $assigned_to</td>
  <td> $description </td>
 
</tr>";
                    }
                  }


                  ?>






                </tbody>
              </table>
            </div>



          </div>
        </div>



        <!-- Content Row -->
        <div class="row">



          <div class="col-lg-6 mb-4">



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






  </div>

  </div>


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- add task modal -->
  <!-- Modal -->
  <div class="modal fade" id="AddTask" tabindex="-1" role="dialog" aria-labelledby="task" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="task">Add New Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4"> Task name</label>
                <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Task Name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Date</label>
                <input type="date" class="form-control" id="inputEmail4" name="date" required>
              </div>

              <div class="form-group col-md-6">
                <label for="inputPassword4">Deadline</label>
                <input type="date" class="form-control" id="inputPassword4" name="deadline" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Assign To</label>
                <select id="inputState" class="form-control" name="assign" required>
                  <option></option>
                  <?php
                  $get_emp = "SELECT * FROM  tbl_employee";
                  $run = mysqli_query($conn, $get_emp);
                  while ($row = mysqli_fetch_array($run)) {
                    $emp_id = $row['emp_ID'];
                    $name = $row['Name'];
                    $surname = $row['surname'];
                    $Display_name = $name . " " . $surname;
                    echo "
                    
                     <option value='$emp_id'>$Display_name</option>
                     ";
                  }
                  ?>

                  <!-- <option selected>Choose...</option>
                <option>Male</option>
                <option>Female</option> -->
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="inputPassword4">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" required>
              </div>


            </div>


            <div class="form-group">

            </div>
            <button type="submit" name="add_task" class="btn btn-primary">Add</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>


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
if (isset($_POST['add_task'])) {
    $taskname = $_POST['name'];
    $date = $_POST['date'];
    $end = $_POST['deadline'];
    $status = "inprogress";

    $assigned_to = $_POST['assign'];
    $description = $_POST['description'];
    $progress = 0;
    $content = "New task ";
    $today = date("F j, Y, g:i a");
    $admin = $_SESSION['user'];

    $diff = abs(strtotime($end) - strtotime($date));

    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    $duration = $days;

    $query = "SELECT * FROM tbl_tasks";
    $statement = mysqli_stmt_init($conn); //initialize prepared statement

    $checkTask = "SELECT * FROM tbl_tasks where employee = '$assigned_to' AND task_name='$taskname' and  status ='inprogress' ";
    $run_check = mysqli_query($conn, $checkTask);
    $count = mysqli_num_rows($run_check);
    if ($count > 0) {
        echo "<script>alert('Task already assigned to this employee and has to be completed first!!')</script>";
        echo "<script>window.open('Tasks.php','_self')</script>";
    } else {


  //check if it does not work
        if (!mysqli_stmt_prepare($statement, $query)) {
            echo "<script>alert('Server error! please try again later')</script>";
            echo "<script>window.open('Tasks.php','_self')</script>";
        } else {
            $insert = "INSERT INTO tbl_tasks (task_name,task_date,deadline,duration,employee,description,progress,status) VALUES(?,?,?,?,?,?,?,?)";
            $insert_notification = "INSERT INTO emp_notifications(content,date,emp_id,admin) values(?,?,?,?)";
            $statement = mysqli_stmt_init($conn);
            $statement2 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $insert) || !mysqli_stmt_prepare($statement2, $insert_notification)) {
                echo "<script>alert('Server error! please try again later')</script>";
                echo "<script>window.open('Tasks.php','_self')</script>";
            } else {
                mysqli_stmt_bind_param($statement, "ssssisis", $taskname, $date, $end, $duration, $assigned_to, $description, $progress, $status); //bind data
      mysqli_stmt_bind_param($statement2, "ssis", $content, $today, $assigned_to, $admin); //bind data

      mysqli_stmt_execute($statement);
                mysqli_stmt_execute($statement2);
                echo "<script>alert('New Task has been been created')</script>";
                echo "<script>window.open('Tasks.php','_self')</script>";
            }
        }
    }
}

?>