<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rApptDate = $_POST['rApptDate'];
    $rApptTime = $_POST['rApptTime'];
    
    echo "Received rApptDate: " . $rApptDate . "<br>";
    echo "Received rApptTime: " . $rApptTime . "<br>";
    
    // Check the format of rApptTime
    $time = DateTime::createFromFormat('H:i', $rApptTime);
    if ($time && $time->format('H:i') === $rApptTime) {
        echo "rApptTime is in the correct format (H:i).";
    } else {
        echo "rApptTime is not in the correct format.";
    }
} else {
    echo "No data received.";
}
?>