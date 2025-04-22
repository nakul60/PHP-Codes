<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "cookie_practice";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
    die("Failed to connect to MYSQL!" . mysqli_connect_error());
}

?>