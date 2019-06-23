<?php
    // Config file for handling DB access
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "purchase";

    $conn =  mysqli_connect($server, $user, $password, $dbname);

    if (!$conn) {
        die("Connection Failed ".mysqli_connect_error());
    }
    else {
        // echo "Connection Established";
    }
?>