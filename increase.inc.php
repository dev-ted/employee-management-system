<?php
if (isset($_POST['submit'])) {
    include "includes/db_con.php";
    session_start();
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $position = $_POST['position'];
   
    $start_date = $_POST['date'];
    $Reasons = $_POST['reason'];
    $id = $_SESSION['id'];
    $status = "pending";

    $content = "salary increase application request";
    $today = date("F j, Y, g:i a");
    $now = date("Y-m-d H:i:s");
    $employee = $_SESSION['user'];

    //$diff = abs(strtotime($to) - strtotime($from));

    // $years = floor($diff / (365 * 60 * 60 * 24));
    // $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    // $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    // $duration = $days;

    $query = "SELECT * FROM tbl_increaserequest where emp_ID =? and status =?";
    $statement = mysqli_stmt_init($conn); //initialize prepared statement

    //check if it does not work
    if (!mysqli_stmt_prepare($statement, $query)) {
        echo "<script>alert('Server error! please try again later')</script>";
        echo "<script>window.open('increase.php','_self')</script>";
    } else {
        mysqli_stmt_bind_param($statement, "is", $id,$status);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $check_results = mysqli_stmt_num_rows($statement);
        if ($check_results > 0) {
            echo "<script>alert('You Application is Still Pending! You can not apply for another one')</script>";
            echo "<script>window.open('Progress.php','_self')</script>";
        } else {
            $insert = "INSERT INTO tbl_increaserequest (Emp_Name,Emp_surname,Position,Start_Date,reason,emp_ID,date_applied,status) VALUES(?,?,?,?,?,?,?,?)";
            $insert_notification = "INSERT INTO admin_notifications(content,date,employee) values(?,?,?)";
            $statement = mysqli_stmt_init($conn);
            $statement2 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $insert) || !mysqli_stmt_prepare($statement2, $insert_notification)) {
                echo "<script>alert('Server error! Application could not be processed please try again later')</script>";
                echo "<script>window.open('increase.php','_self')</script>";
            } else {
                mysqli_stmt_bind_param($statement, "sssssiss", $name, $surname, $position, $start_date,$Reasons, $id, $now,$status); //bind data
                mysqli_stmt_bind_param($statement2, "sss", $content, $today, $employee); //bind data

                mysqli_stmt_execute($statement);
                mysqli_stmt_execute($statement2);
                echo "<script>alert('Your Application has been submitted and is now being Processed')</script>";
               echo "<script>window.open('Progress.php','_self')</script>";
            }
        }
    }
}
