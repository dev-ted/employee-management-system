
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
  
  

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Edit / delete </h1>
      <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        


<div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                <h6 class="m-0 font-weight-bold text-primary">Edit / Delete Employee</h6>
              </a>
        </div>
        <div class="collapse show " id="collapseCard">
          
            <div class="card-body collapse show">
              <form method="POST">
              <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputState">Employee</label>
              <select id="inputState" class="form-control" name="id" required>
                <option  >choose....</option>
                <?php
                 $get_emp = "SELECT * FROM  tbl_employee";
                 $run = mysqli_query($conn, $get_emp);
                 while ($row = mysqli_fetch_array($run)) {
                     $emp_id = $row['emp_ID'];
                     $name = $row['Name'];
                            $surname = $row['surname'];
                  
                     $Display_name = $name." ".$surname;
                     
                     echo "<option value='$emp_id'>$Display_name</option>
                     ";
                 }

                 ?>

              </select>
            </div>

        </div>
        <div class="form-group col-md-4">

        <button class="btn btn-success " name="edit"> <i class="fas fa-check-circle"></i>Edit</button>
        </div>
      
             
                    <?php 
                    if(isset($_POST['edit'])){
                        $ID = $_POST['id'];
                        $get_emp = "SELECT * FROM  tbl_employee where emp_ID ='$ID'";
                        $run = mysqli_query($conn, $get_emp);

                        while ($row = mysqli_fetch_array($run)) {
                            $emp_id = $row['emp_ID'];
                            $name = $row['Name'];
                            $surname = $row['surname'];
                            $email = $row['EMAIL_ADDRESS'];
                            $idno = $row['ID_NUMBER'];
                            $telno = $row['PHONE_NUMBER'];
                            $gender = $row['GENDER'];
                            $age = $row['AGE'];
                            $position = $row['position'];
                            $startdate = $row['START_DATE'];
                            $salary = $row['SALARY'];
                            $address1 = $row['ADDRESS_1'];
                            $address2 = $row['ADDRESS_2'];
                            $city = $row['CITY'];
                            $zip = $row['ZIP'];
                            
                            
                            
                        }

                        echo '
                        <div class="col-lg-8">
                    <div class="card2 card border-0 px-4 py-5 center" >
                      
                    
                          <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                            <div class="form-group col-md-6">
              <label for="inputEmail4">name</label>
              <input type="text" class="form-control" value="'.$name.'"  name="name"  required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">surname</label>
              <input type="text" class="form-control" value="'.$surname.'" name="surname">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email Address</label>
              <input type="email" class="form-control" value="'.$email.'" name="email" placeholder="Email Address" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">ID Number</label>
              <input type="number"  class="form-control" value="'.$idno.'" name="id_number" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Phone Number</label>
              <input type="number" class="form-control" value="'.$telno.'" name="phone_number" placeholder="Phone Number" >
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Gender</label>
              <input id="inputState" class="form-control" value="'.$gender.'" name="gender" readonly>
               
              </input>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Age</label>
              <input type="number" class="form-control" name="age" value="'.$age.'" placeholder="Age" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Position</label>
              <input id="inputState" class="form-control" value="'.$position.'" name="position" readonly>
                
              </input>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Start Date</label>
              <input type="date" class="form-control" value="'.$startdate.'" name="start_date" placeholder="Start date" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Salary</label>
              <input type="number" class="form-control" value="'.$salary.'" name="salary" placeholder="Salary" readonly>
            </div>
           
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" value="'.$address1.'" name="address1" placeholder="1234 Main St">
          </div>
          <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" value="'.$address2.'" name="address2" placeholder="Apartment, studio, or floor">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" value="'.$city.'" name="city" >
            </div>
           
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" name="zip" value="'.$zip.'" >
            </div>
          </div>
          <div class="form-group">
           
          </div>
          <div class="form-row">
          
          <div class="form-group col-md-2">
          <button class="btn btn-success " type="submit" name="update" > <i class="fas fa-plus"></i> Update</button>
          </div>
          <div class="form-group col-md-2">
          <button class="btn btn-danger " type="submit" name="delete" > <i class="fas fa-times"></i> delete</button>
          </div>
          </div>
                            
                          </form>
                    </div>
                </div>';
                    }

                    ?>
                    <?php
            ///delete employee 

           
                if (isset($_POST['delete'])) {
                   
                        $delete_product = "DELETE FROM tbl_employee where emp_ID ='$emp_id'";
                        $run_delete =  mysqli_query($conn, $delete_product);

                        if ($run_delete) {
                            echo "<script>window.open('edit.php','_self')</script>";
                        }
                    }
                
    



            ?>
                    
                    <?php
            ///delete employee 

           
                if (isset($_POST['update'])) {
                  //fetch data from text fields
  $id =$_POST['id'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $telno = $_POST['phone_number'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
                   
                  $update_user = "UPDATE tbl_employee SET Name='$name',surname='$surname',EMAIL_ADDRESS='$email',PHONE_NUMBER='$telno',ADDRESS_1='$address1',ADDRESS_2='$address2',CITY='$city',ZIP='$zip' WHERE emp_ID ='$id'";
                        $run_update =  mysqli_query($conn, $update_user);

                        if (!$run_update) {
                          echo"<script language='javascript'>alert('Employee information not updated!')</script>";
                            echo "<script>window.open('dashboard.php','_self')</script>";
                        }
                        else{
                          echo"<script language='javascript'>alert('Employee information updated!')</script>";
                          echo "<script>window.open('dashboard.php','_self')</script>";
                        }
                    }
                
    



            ?>
 
                    

        
        
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

<?php


if(isset($_POST['updatess'])){
    
   include("../includes/db_con.php");
  // include_once "edit.php";

  //fetch data from text fields
  $id =$_POST['id'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $telno = $_POST['phone_number'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];

 
          $update_user = "UPDATE tbl_employee SET Name=?,surname=?,EMAIL_ADDRESS=?,PHONE_NUMBER=?,ADDRESS_1=?,ADDRESS_2=?,CITY=?,ZIP=? WHERE emp_ID =?";
          
          
          $statement = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($statement,$update_user)){
              echo"<script language='javascript'>alert('Server Error!')</script>";
              echo"<script>document.location='edit.php';</script>";
          }
          else{

              mysqli_stmt_bind_param($statement,"ssssssssi",$name,$surname,$email,$telno,$address1,$address2,$city,$zip,$id);//bind data
              mysqli_stmt_execute($statement);
             
              echo"<script language='javascript'>alert('Employee info updated!')</script>";
             echo"<script>document.location='edit.php';</script>";

          }
          
         
        

      
      }
  


?>