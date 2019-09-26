<?php
    $servername = "localhost";
    $dBUsername = "root";
    $dBpassword = "";
    $dBName = "hera-budget";

    $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBName);

    if(!$conn) {
        die("connection failed:" .mysqli_connect_error());
    }
?>