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


      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Company Employees</h1>
      <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
          <br>

        </div>
        <div class="form-row">
          <div class="form-group col-md-2">
            <button class="btn btn-primary " data-toggle="modal" data-target="#AddEmployee"> <i class="fas fa-plus"></i> add Employee</button>
          </div>
          <div class="form-group col-md-2">
            <a class="btn btn-success " href="edit.php"> <i class="fas fa-plus"></i> edit Employee</a>
          </div>
          <div class="form-group col-md-2">
            <button class="btn btn-warning " data-toggle="modal" data-target="#sendmail"> <i class="fas fa-envelope"></i> Send Mail</button>
          </div>
        </div>



        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>

                <tr>
                  <th>ID Number</th>
                  <th>Name</th>
                  <th>Surname</th>
                  <th>Position</th>
                  <th>Age</th>
                  <th>gender</th>
                  <th>Phone</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>

              <tbody>
                <?php


                $getEmployees = "SELECT * FROM tbl_employee";
                $run = mysqli_query($conn, $getEmployees);
                while ($row = mysqli_fetch_array($run)) {
                  $name = $row['Name'];
                  $surname = $row['surname'];
                  $id_no = $row['ID_NUMBER'];
                  $position = $row['position'];
                  $age = $row['AGE'];
                  $startdate = $row['START_DATE'];
                  $salary = $row['SALARY'];
                  $phone = $row['PHONE_NUMBER'];
                  $gender = $row['GENDER'];

                  echo "
  
  <tr>
  <td>  $id_no </td>
  <td>   $name </td>
  <td>  $surname </td>
  <td> $position </td>
  <td>  $age</td>
  <td> $gender </td>
  <td>  $phone </td>
  <td> $startdate </td>
  <td> R $salary </td>
  
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

  </div>

  </div>


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- add employee modal -->
  <!-- Modal -->
  <div class="modal fade" id="AddEmployee" tabindex="-1" role="dialog" aria-labelledby="NewEmployeeCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="NewEmployeeModalLongTitle">Add New Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">name</label>
                <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Full Name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">surname</label>
                <input type="text" class="form-control" id="inputEmail4" name="surname" placeholder="Surname" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email Address</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email Address" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">ID Number</label>
                <input type="number" class="form-control" id="inputPassword4" name="id_number" placeholder="ID Number" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Phone Number</label>
                <input type="number" class="form-control" id="inputPassword4" name="phone_number" placeholder="Phone Number" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Gender</label>
                <select id="inputState" class="form-control" name="gender" required>
                  <option ></option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Age</label>
                <input type="number" class="form-control" name="age" id="inputPassword4" placeholder="Age" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Position</label>
                <select id="inputState" class="form-control" name="position">
                  <option></option>
                  <option>Mechanic</option>
                  <option>Cleaner</option>
                  <option>Technician</option>
                  <option>Driver</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Start Date</label>
                <input type="date" class="form-control" id="inputPassword4" name="start_date" placeholder="Start date" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Salary</label>
                <input type="number" class="form-control" id="inputPassword4" name="salary" placeholder="Salary" required>
              </div>

            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" required>
              </div>

              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" name="zip" id="inputZip" required>
              </div>
            </div>
            <div class="form-group">

            </div>
            <button type="submit" name="add_emp" class="btn btn-primary">Add</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- send modal -->
  <!-- Modal -->
  <div class="modal fade" id="sendmail" tabindex="-1" role="dialog" aria-labelledby="NewEmployeeCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="NewEmployeeModalLongTitle">Send mail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputState">email address</label>
                <select id="inputState" class="form-control" name="email" required>
                  <option></option>
                  <?php


                  $get_emp = "SELECT * FROM  tbl_employee";
                  $run = mysqli_query($conn, $get_emp);
                  while ($row = mysqli_fetch_array($run)) {
                    $emp_id = $row['emp_ID'];
                    $name = $row['Name'];

                    $surname = $row['surname'];
                    $email = $row['EMAIL_ADDRESS'];
                    $Display_name = $name . " " . $surname;

                    echo "
                    
                     <option value='$email'>$email</option>
                     ";
                    $get_emp = "SELECT * FROM  tbl_employee where EMAIL_ADDRESS ='$email'";
                    $run_QUERY = mysqli_query($conn, $get_emp);

                    while ($row = mysqli_fetch_array($run_QUERY)) {
                      $Username = $row['USERNAME'];
                      $Password = "Password1";
                      $name = $row['Name'];

                      $surname = $row['surname'];

                      $Display_name = $name . " " . $surname;
                    }
                  }



                  ?>



                </select>
              </div>



              <div class="form-group col-md-12">
                <label for="inputEmail4">Subject</label>
                <input type="text" class="form-control" name="subject" required>
              </div>


            </div>

            <div class="form-group">

            </div>
            <button type="submit" name="send-email" class="btn btn-primary">Send </button>
          </form>

          <?php
          // Import PHPMailer classes into the global namespace
          // These must be at the top of your script, not inside a function
          use PHPMailer\PHPMailer\PHPMailer;
          use PHPMailer\PHPMailer\SMTP;
          use PHPMailer\PHPMailer\Exception;

          if (isset($_POST['send-email'])) {
            $subject  = $_POST['subject'];
            $admin = $_SESSION['user'];



            // Load Composer's autoloader
            require 'vendor/autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
              //Server settings
              //$mail->SMTPDebug = 2;  //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
              $mail->isSMTP();                                            // Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
              $mail->Username   = 'jocktech23@gmail.com';                     // SMTP username
              $mail->Password   = '@jocktech19';                               // SMTP password
              $mail->SMTPSecure = 'tls';   //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
              $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

              //Recipients
              $mail->setFrom('admin@sxm.co.za', $admin);
              $mail->addAddress($email);     // Add a recipient


              $body  = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                       <tr>
                                       <td style="padding: 10px 0 30px 0;">
                                         <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                           <tr>
                                             <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                               <img src="https://socpsy.boun.edu.tr/sites/socpsy.boun.edu.tr/files/unnamed.png" alt="Welcome" width="300" height="230" style="display: block;" />
                                             </td>
                                           </tr>
                                           <tr>
                                             <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                 <tr>
                                                   <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                                     <b>Hey there ' . $Display_name . '</b>
                                                   </td>
                                                 </tr>
                                                 <tr>
                                                   <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                   I would  like to welcome you to SXM Trading. We are excited that you have agreed to join us. I believe that you are mutually excited about your new employment with Us.
                                                     <br>
                                                     
                                                     <br>
                                                     Your username is ' . $Username . ' and the default password is "Password1" <br>
                                                     use these credentials to log into the system
                                                     <br> Use this <a href ="http://jockteck.hstn.me/register.php">Link </a> to register  a new password of your choice
                                                   </td>
                                                 </tr>
                                                 
                                               </table>
                                             </td>
                                           </tr>
                                           <tr>
                                           
                                           </tr>
                                         </table>
                                       </td>
                                     </tr>
								
							</table>
						</td>
					</tr>

                                       </table>';


              // Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = $subject;
              $mail->Body    = $body;
              $mail->AltBody = "username is $Username  and the defaults password is Password 1";

              $mail->send();
              echo "<script>alert('message sent')</script>";
              echo "<script>window.open('employees.php','_self')</script>";
            } catch (Exception $e) {
              //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              echo "<script>alert('eMessage could not be sent. Mailer Error:'{$mail->ErrorInfo}')</script>";
              echo "<script>window.open('employees.php','_self')</script>";
            }
          }
          ?>
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

if (isset($_POST['add_emp'])) {
  include("../includes/db_con.php");
  //fetch data from text fields
  $domain = "@sxm.co.za";

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $ID_No = $_POST['id_number'];
  $Phone_No = $_POST['phone_number'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $position = $_POST['position'];
  $salary = $_POST['salary'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $startdate = $_POST['start_date'];



  $Password = "password1";

  //use prepared statements to create queries

  // check if user already exists

  $check_user = "SELECT EMAIL_ADDRESS FROM tbl_employee WHERE EMAIL_ADDRESS =?";
  $statement = mysqli_stmt_init($conn); //initialize prepared statement

  //check if it does not work
  if (!mysqli_stmt_prepare($statement, $check_user)) {
    echo "<script>alert('Server error! please try again later')</script>";
    echo "<script>window.open('employees.php','_self')</script>";
  } else {
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);


    mysqli_stmt_store_result($statement);

    $check_results = mysqli_stmt_num_rows($statement);
    if ($check_results > 0) {
      echo "<script>alert('Employee with this email address already exists!')</script>";
      echo "<script>window.open('employees.php','_self')</script>";
    } else {
      //insert users
      $pass_hash = password_hash($Password, PASSWORD_DEFAULT);
      $random = rand(1, 100);
      $Username = strtolower($name . $surname . $random . $domain);


      $insert_user = "INSERT INTO tbl_employee(Name,surname,EMAIL_ADDRESS,ID_NUMBER,PHONE_NUMBER,GENDER,AGE,position,START_DATE,SALARY,ADDRESS_1,ADDRESS_2,CITY,ZIP,USERNAME,PASSWORD) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $statement = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($statement, $insert_user)) {
        echo "<script>alert('Server error! please try again later!')</script>";
        echo "<script>window.open('employees.php','_self')</script>";
      } else {
        mysqli_stmt_bind_param($statement, "ssssssississssss", $name, $surname, $email, $ID_No, $Phone_No, $gender, $age, $position, $startdate, $salary, $address1, $address2, $city, $zip, $Username, $pass_hash); //bind data
        mysqli_stmt_execute($statement);

        echo "<script>alert('employee successfully added')</script>";
        // mail($to_email,$subject,$message,$headers);

        echo "<script>window.open('employees.php','_self')</script>";
      }
    }
  }
}
?>