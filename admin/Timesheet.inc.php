<?php

if (isset($_POST['create'])) {
  include("../includes/db_con.php");
  include_once "Timesheet.php";
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'] ;
    $diff = (int) $end_time - (int) $start_time;
    $overtime = $_POST['overtime'];
    

    $totalhours = $diff + $overtime;
    $regularhours = $diff;
    $emp_id = $_POST['name'];
   
    

    

    $query = "SELECT * FROM tbl_timesheet";
   
    $statement = mysqli_stmt_init($conn); //initialize prepared statement
   
   

    //check if it does not work
    if (!mysqli_stmt_prepare($statement, $query)) {
      echo"<script language='javascript'>alert('Server Error!')</script>";
      echo"<script>document.location='Timesheet.php';</script>";
    } else {
        $insert = "INSERT INTO tbl_timesheet (Date,Start_Time,Finish_Time,Regular_Hours,Overtime_Hours,Totalworked_hours,emp_ID) VALUES(?,?,?,?,?,?,?)";
   
        $statement = mysqli_stmt_init($conn);
        // $getTasks = "SELECT * FROM tbl_employee WHERE emp_ID = '$emp_id'";
        // $run = mysqli_query($conn,$getTasks);
        // $row = mysqli_fetch_array($run);
        
        // $name = $row['Name'];
   
    
        if (!mysqli_stmt_prepare($statement, $insert)) {
          echo"<script language='javascript'>alert('Server Error!')</script>";
          echo"<script>document.location='Timesheet.php';</script>";
        } else {
            mysqli_stmt_bind_param($statement, "sssiiii", $date, $start_time, $end_time, $regularhours, $overtime, $totalhours, $emp_id);//bind data
     
      
            mysqli_stmt_execute($statement);
 
            echo"<script language='javascript'>alert('Timesheet Created')</script>";
            echo"<script>document.location='Timesheet.php';</script>";
        
        }
    }
}


?>