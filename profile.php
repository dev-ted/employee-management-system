




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
  <link rel="stylesheet" href="css/profile.css">
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
  
  

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Profile</h1>
      <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        

      <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img img-fluid">
                            <img src="images/logo.png" alt="">
                            <div class="file btn btn-lg btn-primary">
                               
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>

                    <?php 
                        $id = $_GET['id'];
                        $query = "SELECT * FROM tbl_employee where emp_ID  ='$id'";
                        $run = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($run)){
                            $name = $row['Name'];
                            $SURNAME = $row['surname'];
                            $email = $row['EMAIL_ADDRESS'];
                            $phone = $row['PHONE_NUMBER'];
                            $ID = $row['ID_NUMBER'];
                            $username = $row['USERNAME'];
                            $position = $row['position'];
                            $salary = $row['SALARY'];
                            $benefits = "Medical Aids ,Car Allowance";
                             $start = $row['START_DATE'];
                            // $name = $row['NAME'];
                        }
                    ?>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       <?php echo $name  ." ". $SURNAME ; ?>
                                    </h5>
                                    <h6>
                                     <?php echo  $position; ?>
                                    </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profiles" role="tab" aria-controls="profile" aria-selected="false">Personal</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                           
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Employee ID:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['id']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $name ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Surname</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $SURNAME ; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $email?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $phone?></p>
                                            </div>
                                        </div>
                                      
                            </div>
                            <div class="tab-pane fade" id="profiles" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>ID Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $ID?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $username?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Benefits</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $benefits?></p>
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Start date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $start; ?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Salary</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo "R". $salary; ?> </p>
                                            </div>
                                        </div>
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
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





