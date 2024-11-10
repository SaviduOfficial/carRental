<?php
include "config.php"; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $vehicleID = $_POST['VehicleID'];
    $color = $_POST['Color'];
    // Add other fields here if necessary

    // Update query (e.g., update the color)
    $query = "UPDATE registered_vehicles SET Color = ? WHERE VehicleID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $color, $vehicleID);
    
    if ($stmt->execute()) {
        echo "Vehicle details updated successfully.";
    } else {
        echo "Error updating vehicle details.";
    }

    $stmt->close();
}
$conn->close();



//updating booking database milage 

//check for last booking date, mialge, vehicle id and if all equal update the booking table. else dont.
// date need to be formated as same everywhere


?>
