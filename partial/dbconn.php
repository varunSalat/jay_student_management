<?php

    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database = "student_manage_db";

    $conn = mysqli_connect($server_name,$username,$password,$database);

    if(!$conn){
        die("Error". mysqli_connect_error());
    }

?>