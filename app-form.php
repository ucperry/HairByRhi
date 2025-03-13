<?php

//database Information
$servername = "82.197.82.123";
$database = "u351350235_HairByRhi";
$username = "u351350235_Perry";
$password = "The12makeit#1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (mysqli_connect_error()) {
    die("Connection error: " . mysqli_connect_error());
}

//Autocapture Form Data
$submissionDate = date("Y-m-d H:i:s");
$ipAddress = $_SERVER['REMOTE_ADDR'];
$referer = $_SERVER['HTTP_REFERER'];

//User Submitted ID Data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

//User Submitted Appointment Data
$rApptDate = date('Y-m-d', strtotime($_POST['rApptDate']));
$rApptTime = date("g:i a", strtotime($_POST['rApptTime']));
$clientMessage = $_POST['clientMessage'];


//SQL Statement
$sql= "INSERT INTO client_appt_request (submissionDate, 
                                        ipAddress, 
                                        referer, 
                                        firstName, 
                                        lastName, 
                                        email, 
                                        phone, 
                                        rApptDate, 
                                        rApptTime, 
                                        clientMessage) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//initialize statement
$stmt = mysqli_stmt_init($conn);

//prepare statement
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
echo "Thank you for your appointment request to Hair by Rhiannon, We will be in touch soon.";

?>
 