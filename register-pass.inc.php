





<?php


//copyright jocktech inc 2020


//check if the user accessed to this script

if(isset($_POST['submit_btn'])){
    include("includes/db_con.php");

    //fetch data from text fields
    
    $Username =  trim($_POST['username']) ;
    $Password = trim($_POST['password'])   ;


    

    //use prepared statements to create queries

    // check if user already exists

    $check_user = "SELECT * FROM tbl_employee WHERE USERNAME =?";
    $statement = mysqli_stmt_init($conn); //initialize prepared statement

    //check if it does not work
    if(!mysqli_stmt_prepare($statement,$check_user)){
        header("Location: register.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($statement,"s",$Username);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $check_results = mysqli_stmt_num_rows($statement);
        if($check_results <0 ){
            header("Location: register.php?error=invalidusername".$Username);
            exit();
        }
        else{
            //update pass users


            // $insert_user = "INSERT INTO tbl_employe(NAME,SURNAME,ID_NUMBER,PHONE_NUMBER,EMAIL,USERNAME,PASSWORD) VALUES(?,?,?,?,?,?,?)";
            $update_user = "UPDATE tbl_employee SET PASSWORD =? WHERE USERNAME=?";
            
            $statement = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($statement,$update_user)){
                header("Location: register.php?error=sqlerror");
                exit();
            }
            else{

               

                //hash password
                $pass_hash = password_hash($Password,PASSWORD_DEFAULT);
                
                mysqli_stmt_bind_param($statement,"ss",$pass_hash,$Username);//bind data
                mysqli_stmt_execute($statement);
                session_start();
                // $name = $row['NAME'];
                // $surname = $row['SURNAME'];
                // $Display_name = $name." ".$surname;
                // $_SESSION['user'] = $Display_name;
                header("Location: index.php?signup=success");
                exit();

            }
            

          

        
        }
    }

    mysqli_stmt_close($statement); //close statement
    mysqli_stmt_close($conn); //close connection
   

}
else{
    //send user to register page if they tried to
    header("Location: register.php");
    exit();
}