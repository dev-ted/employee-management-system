<?php
  if (isset($_POST['apply'])) {
    include("includes/db_con.php");
    session_start();
      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $position =$_POST['position'];
      $leaveType = $_POST['type'];
      $from = $_POST['from_date'];
      $to = $_POST['to_date'];
      $Reasons = $_POST['reason'];
      $id = $_SESSION['id'];
      $status = "pending";
   
      $content = "Leave application request";
      $today = date("F j, Y, g:i a");
      $now =date("Y-m-d H:i:s");
      $employee = $_SESSION['user'];
   
      $diff = abs(strtotime($to) - strtotime($from));
    
      $years = floor($diff / (365*60*60*24));
      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
      $duration = $days;
        $leave_days =21;
    

      

      $query = "SELECT * FROM tbl_leave where emp_id =? AND status=?";
      $statement = mysqli_stmt_init($conn); //initialize prepared statement

      //check if it does not work
      if (!mysqli_stmt_prepare($statement, $query)) {
          echo "<script>alert('Server error! please try again later')</script>";
          echo "<script>window.open('leave.php','_self')</script>";
      } else {
          mysqli_stmt_bind_param($statement, "is", $id,$status);
          mysqli_stmt_execute($statement);
          mysqli_stmt_store_result($statement);
          $check_results = mysqli_stmt_num_rows($statement);
          if ($check_results >0) {
            echo "<script>alert('You Application is Still Pending! You can not apply for another one')</script>";
            echo "<script>window.open('track.php','_self')</script>";
          } else {
              $insert = "INSERT INTO tbl_leave (Emp_Name,Emp_surname,Position,type,from_date,to_date,Reason,status,Number_of_Days,leave_days,emp_id,date_applied) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
              $insert_notification = "INSERT INTO admin_notifications(content,date,employee) values(?,?,?)";
              $statement = mysqli_stmt_init($conn);
              $statement2 = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($statement, $insert) || !mysqli_stmt_prepare($statement2, $insert_notification)) {
                  echo "<script>alert('Server error! Application could not be processed please try again later')</script>";
                  echo "<script>window.open('leave.php','_self')</script>";
              } else {
                  mysqli_stmt_bind_param($statement, "ssssssssiiis", $name, $surname, $position, $leaveType, $from, $to, $Reasons,$status,$duration,$leave_days,$id,$now);//bind data
     mysqli_stmt_bind_param($statement2, "sss", $content, $today, $employee);//bind data
      
      mysqli_stmt_execute($statement);
                  mysqli_stmt_execute($statement2);
                  echo "<script>alert('Your Application has been submitted and is now being Processed')</script>";
                  echo "<script>window.open('track.php','_self')</script>";
              }
          }
      }
  }
