<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rApptDate = $_POST['rApptDate'];
    echo "Received rApptDate: " . $rApptDate;
} else {
    echo "No data received.";
}
?>