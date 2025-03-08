<?php
$servername = "82.197.82.123";
$database = "u351350235_HairByRhi";
$username = "u351350235_Perry";
$password = "The12makeit#1";

//create connection

$conn = mysqli_connect($servername, $username, $password, $database);

//check connection

if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}

echo "Connected successfully";
mysqli_close($conn);
?>