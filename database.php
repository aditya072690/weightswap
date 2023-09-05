<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "if0_34737748_testlogin";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>