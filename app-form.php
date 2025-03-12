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



//autocapture Sumbission data
$submissionDate = date("Y-m-d H:i:s");
$ipAddress = $_SERVER['REMOTE_ADDR'];
$referer = $_SERVER['HTTP_REFERER'];

//formcapture user input data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Using DateTime class to handle date and time with mm/dd/yyyy format
$rApptDate = DateTime::createFromFormat('m/d/Y', $_POST['rApptDate'])->format('Y-m-d');
$rApptTime = DateTime::createFromFormat('h:i a', $_POST['rApptTime'])->format('H:i:s');

// Client specifics regaurding the services required or curiosities to the stylists availability
$clientMessage = $_POST['clientMessage'];


//insert data into database
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
 