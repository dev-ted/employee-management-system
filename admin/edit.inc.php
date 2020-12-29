





<?php


//copyright jocktech inc 2020


//check if the user accessed to this script

if(isset($_POST['update'])){
    
    // include("./includes/db_con.php");
    // include_once "edit.php";

    //fetch data from text fields
    $id =$_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['Surname'];
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
            
            mysqli_stmt_close($statement); //close statement
            mysqli_stmt_close($conn); //close connection
          

        
        }
    

else{
    //send user to register page if they tried to
    header("Location: dashboard.php");
    exit();
}