<?php
//Basic Database Information

$servername = "82.197.82.123";
$database = "u351350235_HairByRhi";
$username = "u351350235_Perry";
$password = "The12makeit#1";

// Create the connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (mysqli_connect_error()) {
    die("Connection error: " . mysqli_connect_error());
}

$ip = isset ($_SERVER ['HTTP_CLIENT_IP']) 
    ? $_SERVER['HTTP_CLIENT_IP'] 
    : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) 
      ? $_SERVER['HTTP_X_FORWARDED_FOR'] 
      : $_SERVER['REMOTE_ADDR']);

  
?>