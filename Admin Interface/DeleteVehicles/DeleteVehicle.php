<?php
include "../../config.php"; // Database connection
include "../../functions/func.php";

session_start();


$_SESSION['VehicleID'];


$proceed = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    
        $vehicleID = $_SESSION['VehicleID'];
        

        $query = "DELETE FROM registered_vehicles WHERE vehicleID = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s",  $vehicleID);


        if ($stmt->execute()) {
            echo "Vehicle details updated successfully.";
            header('location: searchInterface.php');
            
        } else {
            echo "Error updating vehicle details.";
        }

        $stmt->close();
    }
    


