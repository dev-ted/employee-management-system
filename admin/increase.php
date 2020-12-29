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
            <h6 class="m-0 font-weight-bold text-primary">Salary increase requests</h6>
          </a>
        </div>
        <div class="collapse show" id="collapseCard">

          <div class="card-body collapse show">
            <div class="form-row">
              <div class="form-group col-md-2">
                <button class="btn btn-success " data-toggle="modal" data-target="#Approve"> <i class="fas fa-check-circle"></i> Approve</button>
              </div>
              <div class="form-group col-md-2">
                <button class="btn btn-danger " data-toggle="modal" data-target="#Decline"> <i class="fas fa-times"></i> Decline</button>
              </div>

            </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Emplyee ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Position</th>

                    <th>Start date</th>
                   
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $status = "pending";

                  $getIncreaseRequests = "SELECT * FROM tbl_increaserequest where status ='$status'";
                  $run = mysqli_query($conn, $getIncreaseRequests);
                  while ($row = mysqli_fetch_array($run)) {
                    $id = $row['emp_ID'];
                    $name = $row['Emp_Name'];
                    $surname = $row['Emp_surname'];
                    $startdate = $row['Start_Date'];
                    $position = $row['Position'];
                   



                    echo "
  
  <tr>
  <td>   $id </td>
  <td>   $name </td>
  <td>  $surname </td>
  <td>  $position</td>
  <td> $startdate </td>
 
  
 
  
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


  <!-- add decline modal -->
  <!-- Modal -->
  <div class="modal fade" id="Decline" tabindex="-1" role="dialog" aria-labelledby="announcementCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="announcementModalLongTitle">Decline Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputState">Employee</label>
                <select id="inputState" class="form-control" name="id" required>
                  <option></option>
                  <?php
                  $get_emp = "SELECT * FROM  tbl_increaserequest  where status ='$status'";
                  $run = mysqli_query($conn, $get_emp);
                  while ($row = mysqli_fetch_array($run)) {
                    $emp_id = $row['emp_ID'];
                    $name = $row['Emp_Name'];
                    $surname = $row['Emp_surname'];

                    $Display_name = $name . " " . $surname;

                    echo "<option value='$emp_id'> $emp_id - $Display_name</option>
                     ";
                  }


                  ?>

                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Decision</label>
                <select id="inputState" class="form-control" name="decisions" required>
                  <option></option>

                  <option>Declined</option>


                </select>
              </div>




            </div>



            <div class="form-group">

            </div>
            <button type="submit" name="decline" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- add approved modal -->
  <!-- Modal -->
  <div class="modal fade" id="Approve" tabindex="-1" role="dialog" aria-labelledby="announcementCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="announcementModalLongTitle">Approve Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputState">Employee</label>
                <select id="inputState" class="form-control" name="id" required>
                  <option></option>
                  <?php
                  $status = "pending";
                  $get_emp = "SELECT * FROM  tbl_increaserequest where status ='$status'";
                  $run = mysqli_query($conn, $get_emp);
                  while ($row = mysqli_fetch_array($run)) {
                    $emp_id = $row['emp_ID'];
                    $name = $row['Emp_Name'];
                    $surname = $row['Emp_surname'];

                    $Display_name = $name . " " . $surname;

                    echo "<option value='$emp_id'> $emp_id - $Display_name</option>
                     ";
                  }





                  ?>

                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Decision</label>
                <select id="inputState" class="form-control" name="decision" required>
                  <option></option>

                  <option>Approved</option>


                </select>
              </div>




            </div>



            <div class="form-group col-md-6">
              <span>Increase Amount(%)</span>
              <input type="number" class="form-control" name="amount" required>
            </div>
            <button type="submit" name="Approve" class="btn btn-primary">Submit</button>
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
if (isset($_POST['decline'])) {
  $decision = $_POST['decisions'];
  $emp_id = $_POST['id'];
  $admin = $_SESSION['user'];
  $content = "Salary increase Application " . " " . $decision;
  $today = date("F j, Y, g:i a");

  $select = "SELECT * FROM tbl_increaserequest where emp_ID ='$id' and status ='pending'";
  $run = mysqli_query($conn, $select);
  $row = mysqli_fetch_array($run);
  $app_id = $row['Req_ID'];



  $Update = "UPDATE tbl_increaserequest SET status='$decision' where emp_ID='$emp_id' AND Req_ID ='$app_id'";
  $run_update =  mysqli_query($conn, $Update);
  $insert_notification = "INSERT INTO emp_notifications(content,date,emp_id,admin) values('$content','$today','$emp_id','$admin')";
  $run_insert =  mysqli_query($conn, $insert_notification);

  if ($run_update || $run_insert) {
    echo "<script>alert('Application has been processed')</script>";
    echo "<script>window.open('increase.php','_self')</script>";
  } else {
    echo "<script>alert('Server error! Application could not be processed please try again later')</script>";
  }
}
?>

<!-- approve increase -->

<?php

 // Import PHPMailer classes into the global namespace
          // These must be at the top of your script, not inside a function
          use PHPMailer\PHPMailer\PHPMailer;
          use PHPMailer\PHPMailer\SMTP;
          use PHPMailer\PHPMailer\Exception;
if (isset($_POST['Approve'])) {
  $decision = $_POST['decision'];
  $emp_id = $_POST['id'];
  $admin = $_SESSION['user'];
  $amount = $_POST['amount'];
  $increase_rate = $_POST['rate'];
  $content = "Salary increase Application " . " " . $decision;
  $today = date("F j, Y, g:i a");
  $total;
  $subject  = $_POST['subject'];
  $admin = $_SESSION['user'];

  $select = "SELECT * FROM tbl_increaserequest where emp_ID ='$id' and status = 'pending'";
  $run = mysqli_query($conn, $select);
  $row = mysqli_fetch_array($run);
  $app_id = $row['Req_ID'];


  // calculate increase
  $query = "SELECT * FROM tbl_employee where emp_ID = '$emp_id'";
  
  $run_query = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($run_query);
  $salary = $row['SALARY'];
  $email = $row['EMAIL_ADDRESS'];
  $name = $row['Name'];
  $surname = $row['surname'];
$Display_name = $name ." ". $surname;

  $rate = $amount /100;
  $increase = $salary * $rate;
  $total = $salary + $increase; 

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
                                               <img src="images\logo.png" alt="Welcome" width="300" height="230" style="display: block;" />
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
                                                   Your salary increase request has been reviewed and approved. starting from next month  you will recieve a raise of '.$amount.'% on your current salary
                                                     <br>
                                                     
                                                     <br>
                                                     Administration <br>
                                                    Thank you!
                                                     
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
              $mail->Subject = $content;
              $mail->Body    = $body;
              $mail->AltBody = "username is $Username  and the defaults password is Password 1";
              $Update_salary = "UPDATE tbl_employee SET SALARY='$total' where emp_ID='$emp_id'";
  $run_salaryUpdate =  mysqli_query($conn, $Update_salary);
  $Update = "UPDATE tbl_increaserequest SET status='$decision' where emp_ID='$emp_id' AND Req_ID ='$app_id'";
  $run_update =  mysqli_query($conn, $Update);
  $insert_notification = "INSERT INTO emp_notifications(content,date,emp_id,admin) values('$content','$today','$emp_id','$admin')";
  $run_insert =  mysqli_query($conn, $insert_notification);

  if ($run_update || $run_insert||$run_salaryUpdate) {
    $mail->send();
    echo "<script>alert('Application has been processed ! Salary has been updated')</script>";
    echo "<script>window.open('increase.php','_self')</script>";
  } else {
    echo "<script>alert('Server error! Application could not be processed please try again later')</script>";
    echo "<script>window.open('increase.php','_self')</script>";
  }
              
             
            } catch (Exception $e) {
              //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              echo "<script>alert('eMessage could not be sent. Mailer Error:'{$mail->ErrorInfo}')</script>";
              //echo "<script>window.open('employees.php','_self')</script>";
            }
          






  
}
?>