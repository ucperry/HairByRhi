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

//autocapture Sumbission data
$submissionDate = date("Y-m-d H:i:s");
function get_client_ip() {
    $ipAddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_X_FORWARDED'])
        $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
    else if ($_SERVER['HTTP_FORWARDED_FOR'])
        $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_FORWARDED'])
        $ipAddress = $_SERVER['HTTP_FORWARDED'];
    else if ($_SERVER['REMOTE_ADDR'])
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipAddress = 'UNKNOWN';

    return $ipAddress;
}
$clientipAddress = get_client_ip();
$referer = $_SERVER['HTTP_REFERER'];

//The User Submitted ID Data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

//  The form date capture string format output is m/d/Y
$rApptDate = date('Y-m-d', strtotime($_POST['rApptDate']));

// The form time capture string format is (H:i)
$rApptTime = DateTime::createFromFormat('H:i', $_POST['rApptTime'])->format('H:i:s');

// Convert rApptTime to 'h:i a' format
$rApptTimeFormatted = DateTime::createFromFormat('H:i', $_POST['rApptTime'])->format('h:i a');

// Client specifics regaurding the services required or curiosities to the stylists availability
$clientMessage = $_POST['clientMessage'];

//insert data into database
$sql= "INSERT INTO client_appt_request (submissionDate, 
                                        clientipAddress, 
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
                        $clientipAddress, 
                        $firstName, 
                        $lastName, 
                        $email, 
                        $phone, 
                        $rApptDate, 
                        $rApptTime, 
                        $clientMessage);

//execute statement
mysqli_stmt_execute($stmt);

//close statement
mysqli_stmt_close($stmt);
mysqli_close($conn);

//restating the information entered into the form
echo "Thank you for your appointment request. We have received the following information:<br>";
echo "First Name: " . htmlspecialchars($firstName) . "<br>";
echo "Last Name: " . htmlspecialchars($lastName) . "<br>";
echo "Email: " . htmlspecialchars($email) . "<br>";
echo "Phone: " . htmlspecialchars($phone) . "<br>";
echo "Desired Appointment Date: " . htmlspecialchars($rApptDate) . "<br>";
echo "Desired Appointment Time: " . htmlspecialchars($rApptTimeFormatted) . "<br>";
echo "Message: " . htmlspecialchars($clientMessage) . "<br>";
?>