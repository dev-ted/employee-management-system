<?php


$user = 'root';
$pasword = ''; //To be completed if you have set a password to root
$database = 'ems_db'; //To be completed to connect to a database. The database must exist.
$port = 3308; //Default must be NULL to use default port
$conn = new mysqli('localhost', $user, $pasword, $database, $port);



if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}


