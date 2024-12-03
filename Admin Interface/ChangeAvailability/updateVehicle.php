<?php
include "../../config.php";
include "../../functions/func.php";

session_start();

$_SESSION['selection'];
$_SESSION['VehicleID'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the values from the form
    if ($_SESSION['selection'] === 'no') {
        $vehicleID = $_SESSION['VehicleID'];
        $availability = $_POST['availability'];

        $proceed = changeAvailability($vehicleID, $availability);

        if ($proceed == true) {
            echo "Vehicle details updated successfully.";

            // Prepare the SQL DELETE statement
            $stmt2 = $conn->prepare("DELETE FROM availability WHERE VehicleID = ?");
            $stmt2->bind_param("s", $vehicleID);

            // Execute the statement
            if ($stmt2->execute()) {
                
                echo "<script>
                alert('Availability updated successfuly');
                window.location.href = '../admin_home.php';
                </script>";
            } else {
                echo "Error deleting record: " . $stmt2->error;
            }
        } else {
            echo "Error updating Availability table.";
        }

        $stmt2->close();
        

    }elseif ($_SESSION['selection'] === 'yes') {

        $vehicleID = $_SESSION['VehicleID'];
        $availability = $_POST['availability'];
        $mainteainece = "Maintainence";


        // Update query 
        $query = "UPDATE registered_vehicles 
                    SET  availability = ? 
                    WHERE VehicleID = ?";

        $stmt1 = $conn->prepare($query);
        $stmt1->bind_param("ss", $availability, $vehicleID);
        echo $vehicleID;


        if ($stmt1->execute()) {
            echo "Vehicle details updated successfully.";          

            // Second update: Update final mileage in the bookings table
            $query3 = "INSERT INTO availability (VehicleID, start_Date, end_Date, availability) VALUES (?, ?, ?, ?)";
            $stmt3 = $conn->prepare($query3);

            // Bind parameters to the prepared statement
            $stmt3->bind_param("ssss", $vehicleID, $mainteainece , $mainteainece , $availability);

            echo $vehicleID;

            // Execute the statement
            if ($stmt3->execute()) {
                echo "<script>
                alert('Availability updated successfuly');
                window.location.href = '../admin_home.php';
                </script>";
            } else {
                echo "Error inserting record: " . $stmt3->error;
            }

            // Close the statement
            
            $stmt3->close();

        
        }else {
            echo "Error inserting record: " . $stmt1->error;
        }
    }
}
