<?php
include "../config.php"; // Database connection

session_start();

$_SESSION['selection'];
$_SESSION['VehicleID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    if($_SESSION['selection'] === 'mileage'){
        $vehicleID = $_SESSION['VehicleID'];
        $Mileage = $_POST['Mileage'];

            $query = "UPDATE registered_vehicles 
            SET  Milage = ? 
            WHERE VehicleID = ?";
            
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $Mileage, $vehicleID);


        if ($stmt->execute()) {
        echo "Vehicle details updated successfully.";
        } else {
        echo "Error updating vehicle details.";
        }

        $stmt->close();
        }
    $conn->close();




    }else{

    $vehicleID = $_POST['VehicleID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $Mileage = $_POST['Mileage'];
    // Add other fields here if necessary

    // Update query to set multiple fields
    $query = "UPDATE registered_vehicles 
              SET First_Name = ?, Last_Name = ?, email = ?, contact_Number = ?, Milage = ? 
              WHERE VehicleID = ?";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $fname, $lname, $email, $contact, $Mileage, $vehicleID);
    
    
    if ($stmt->execute()) {
        echo "Vehicle details updated successfully.";
    } else {
        echo "Error updating vehicle details.";
    }

    $stmt->close();
    $conn->close();
}




//updating booking database milage 

//check for last booking date, mialge, vehicle id and if all equal update the booking table. else dont.
// date need to be formated as same everywhere


?>
