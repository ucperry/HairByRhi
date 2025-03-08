<?php

//autocapture form data
$submissionDate = date('Y-m-d');
$submissionTime = date('h:i:sa');
$ipAddress = $_SERVER['REMOTE_ADDR'];

//form collected data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dApptDate = $_POST['dApptDate'];
$dApptTime  = $_POST['dApptTime'];
$clientMessage = $_POST['clientMessage'];

//database connection
$servername = "82.197.82.123";
$database = "u351350235_HairByRhi";
$username = "u351350235_Perry";
$password = "The12makeit#1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_error()) {
    die("Connection error: " . mysqli_connect_error());
}

//insert data into database
$sql= "INSERT INTO client_appt_request (submissionDate, 
                                        submissionTime, 
                                        ipAddress, 
                                        firstName, 
                                        lastName, 
                                        email, 
                                        phone, 
                                        dApptDate, 
                                        dApptTime, 
                                        clientMessage) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//prepare statement
$stmt = mysqli_stmt_init($conn);

//check if statement is valid
if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_connect_error($conn));
}

//bind parameters
mysqli_stmt_bind_param  ($stmt, "ssssssssss", 
                        $submissionDate, 
                        $submissionTime,   
                        $ipAddress, 
                        $firstName, 
                        $lastName, 
                        $email, 
                        $phone, 
                        $dApptDate, 
                        $dApptTime, 
                        $clientMessage);

//execute statement
mysqli_stmt_execute($stmt);

//close statement
echo "Thank you for your appointment request. We will be in touch soon.";

?>
 