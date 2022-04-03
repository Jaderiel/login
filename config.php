<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db";

    $mysql_select_db = ($dbname);

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>