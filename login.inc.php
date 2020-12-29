<?php

if(isset($_POST['login-btn'])){

    include("includes/db_con.php");
//get data from text fields
$username = $_POST['username'];
$password = $_POST['password'];


$select = "SELECT * FROM tbl_employee where USERNAME =?";
$statement = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($statement,$select)){
    header("Location: index.php?error=sqlerror");
    exit();
}
else{
    //get info from database
    mysqli_stmt_bind_param($statement,"s",$username);
    mysqli_stmt_execute($statement);
    $results = mysqli_stmt_get_result($statement);

    if($row = mysqli_fetch_assoc($results)){
        $check_pass = password_verify($password,$row['PASSWORD']);
        if($check_pass == false){
            header("Location: index.php?error=wrongpassword");
            exit();

        }
        elseif($check_pass ==true){
            $name = $row['Name'];
            $empid = $row['emp_ID'];
            $surname = $row['surname'];
            $Display_name = $name." ".$surname;
            
            session_start();
            $_SESSION['id'] = $empid;
            $_SESSION['user'] = $Display_name;
            header("Location: Dashboard.php?login=success");
                exit();

        }
    }
    else{
        header("Location: index.php?error=nouser");
        exit();

    }
}

}
else{

    header("Location: index.php");
}