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

        try{
            
        if ($stmt->execute()) {
            
            echo "<script>
            alert('Vehicle deleted successfully');
            window.location.href = './searchInterface.php';
            </script>";      
            
        } else {
            echo "Error updating vehicle details.";
        }

        $stmt->close();
    }catch (Exception $e){
        echo $e->getMessage();
    }
    
}


