<?php
include "../config.php"; // Database connection
include "../functions/func.php";

session_start();

$_SESSION['selection'];
$_SESSION['VehicleID'];
$_SESSION['Milage'];
$_SESSION['Engine_capacity'];
$initialMilage = $_SESSION['Milage'];

$proceed = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    if ($_SESSION['selection'] === 'mileage') {
        $vehicleID = $_SESSION['VehicleID'];
        $Mileage = $_POST['Mileage'];

        $query = "UPDATE registered_vehicles 
            SET  Milage = ? 
            WHERE VehicleID = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $Mileage, $vehicleID);


        if ($stmt->execute()) {
            echo "Vehicle details updated successfully.";
            $oldMilage = $_SESSION['Milage'];
            // Second update: Update final mileage in the bookings table
            $query2 = "UPDATE bookings 
                SET finalMileage = ? 
                WHERE VehicleID = ? AND initialMileage = ? ";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("sss", $Mileage, $vehicleID, $oldMilage);

            if ($stmt2->execute()) {
                echo "Final mileage in bookings table updated successfully.";
                $proceed = true;
            } else {
                echo "Error updating final mileage in bookings table.";
            }

            $stmt2->close();
        } else {
            echo "Error updating vehicle details.";
        }

        $stmt->close();
    }
    
} else {

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

        $oldMilage = $_SESSION['Milage'];
        // Second update: Update final mileage in the bookings table
        $query2 = "UPDATE bookings 
             SET finalMileage = ? 
             WHERE VehicleID = ? && initialMileage = ? ";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("sss", $Mileage, $vehicleID, $oldMilage);

        if ($stmt2->execute()) {
            echo "Final mileage in bookings table updated successfully.";
            $initialMilage = $oldMilage;
            $proceed = true;
        } else {
            echo "Error updating final mileage in bookings table.";
        }

        $stmt2->close();
    } else {
        echo "Error updating vehicle details.";
    }

    $stmt->close();
    
}
 
$finalMilage = $Mileage;

if($proceed == true){

    $ecapacity = $_SESSION['Engine_capacity'];
    totalAmount($vehicleID, $initialMilage, $finalMilage, $ecapacity);

}

$conn->close();

//updating booking database milage 

//check for last booking date, mialge, vehicle id and if all equal update the booking table. else dont.
// date need to be formated as same everywhere
