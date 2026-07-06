<?php
    $servername ="localhost";
    $username="root";
    $password="";
    $dbname="qa";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("connection failed". $conn->connect_error);
    } 
?>
