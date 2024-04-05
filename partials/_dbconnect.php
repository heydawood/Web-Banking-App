<?php

// Connecting to database 
$server = "localhost";
$username = "root";
$password = "";
$database = "Banking_Web_App";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn){
    die("error : ".mysqli_connect_error());
}

?>