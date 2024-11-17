<?php

// Connect to the database
include "../config.php";
include "../functions/func.php";

session_start();

$_SESSION['VehicleID'];

$vehicleID = $_SESSION['VehicleID'];


$CID = $_SESSION['CID'];

// echo $_SESSION['VehicleID'];

// echo $vehicleID;


// Query to get vehicle details
$query = "SELECT VehicleID, Vehicle_type, Vehicle_make, Vehicle_model, Milage, Regi_no_p1, Regi_no_p2, Fuel_type, colour, Renatal_charge, image_1 
          FROM registered_vehicles 
          WHERE VehicleID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s",$_SESSION['VehicleID']);
mysqli_stmt_execute($stmt);

// Fetch the result
$result = mysqli_stmt_get_result($stmt);

// Check if any row is returned
if ($row = mysqli_fetch_assoc($result)) {
    // Assign array elements to variables



    

    $vehicleID = $row['VehicleID'];
    $vehicleType = $row['Vehicle_type'];
    $vehicleMake = $row['Vehicle_make'];
    $vehicleModel = $row['Vehicle_model'];
    $mileage = $row['Milage'];
    $regNoPart1 = $row['Regi_no_p1'];
    $regNoPart2 = $row['Regi_no_p2'];
    $fuelType = $row['Fuel_type'];
    $color = $row['colour'];
    $rentalCharge = $row['Renatal_charge'];
    $image1 = $row['image_1'];
    
    // Display or use the variables as needed
    // echo "Vehicle Type: " . $vehicleType . "<br>";
    // echo "Make: " . $vehicleMake . "<br>";
    // echo "Model: " . $vehicleModel . "<br>";
    // echo "Mileage: " . $mileage . "<br>";
    // echo "Registration Part 1: " . $regNoPart1 . "<br>";
    // echo "Registration Part 2: " . $regNoPart2 . "<br>";
    // echo "Fuel Type: " . $fuelType . "<br>";
    // echo "Color: " . $color . "<br>";
    // echo "Rental Charge: " . $rentalCharge . "<br>";
    // echo "Image Path: " . $image1 . "<br>";
} else {
    // echo "No vehicle found with ID: " . $VehicleID;
    // echo "
    // <div class='alert alert-warning text-center' role='alert'>
    //     No vehicle found with ID: " . htmlspecialchars($VehicleID) . "
    // </div>
    // ";
     echo "<script>
            alert('No vehicle found with ID:  . $VehicleID;');
            
            </script>";
}





$proceed = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && 
        !empty($_POST['contactNumber']) && !empty($_POST['pickupdate']) && !empty($_POST['returndate']) && 
        !empty($_POST['pickupAddress'])) {
        
        $pickupdate = new DateTime($_POST['pickupdate']);
        $returndate = new DateTime($_POST['returndate']);
        
        if ($returndate <= $pickupdate) {
            // $_SESSION['error'] = "Return date must be after the pickup date.";
            echo "<script>
            alert('Return date must be after the pickup date.');
            window.location.href = './Booking.php';
            </script>";
            // header(header: "location: ./Booking.php");
            
            exit;
        }

        $proceed = true;
    } else {
        // header("location: ./Booking.php");
        echo "<script>
            alert('Please fill in all Inputs.');
            window.location.href = './Booking.php';
            </script>";
        exit;
    }
}



if ($proceed == true) {
    $pickupdate = new DateTime($_POST['pickupdate']);
    $returndate = new DateTime($_POST['returndate']);
    
    // Query to check for conflicts
    $conflictQuery = "SELECT Booking_Date, Return_Date FROM bookings 
                      WHERE VehicleID = ? 
                      AND NOT (
                          (? >= Return_Date AND ? >= Return_Date) OR 
                          (? <= Booking_Date AND ? <= Booking_Date)
                      )";
    
    $stmt = mysqli_prepare($conn, $conflictQuery);
    $pickupdateStr = $pickupdate->format('Y-m-d');
    $returndateStr = $returndate->format('Y-m-d');
    
    
    // Bind parameters: VehicleID, pickupdate, returndate for both conditions
    mysqli_stmt_bind_param($stmt, "sssss", $vehicleID, $pickupdateStr, $returndateStr, $pickupdateStr, $returndateStr);
    mysqli_stmt_execute($stmt);

    $conflictResult = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($conflictResult) > 0) {
        // $_SESSION['error'] = $conflictResult;
        // $_SESSION['error'] = "The selected vehicle is not available for the specified dates.";
        // header("location: ./Booking.php");
        
        $conflicts = [];
        while ($row = mysqli_fetch_assoc($conflictResult)) {
            
            $conflictKey = $row['Booking_Date'] . ' to ' . $row['Return_Date'];
            $conflicts[$conflictKey] = $conflictKey; // Use keys to avoid duplicates
        }
        
        if (!empty($conflicts)) {
            $conflictDates = implode("\\n", array_values($conflicts));
            
            echo "<script>
                alert('The selected vehicle is not available for the specified dates. Conflicting bookings:\\n{$conflictDates}');
                window.location.href = './Booking.php';
                </script>";
            exit;
        }
    }
    
    mysqli_stmt_close($stmt);





        // $_SESSION['error'] = "Continue with booking insertion";
    // Continue with booking insertion
        $First_Name = $_POST['fname'];
        $Last_Name = $_POST['lname'];
        $email = $_POST['email'];
        $Booking_Date = $_POST['pickupdate'];
        $Return_Date = $_POST['returndate'];
        $Pickup_address = $_POST['pickupAddress'];
    
       
        $Vehicle_type = $vehicleType;
        $Vehicle_make = $vehicleMake;
        $Vehicle_model = $vehicleModel;
        $initialMileage = $mileage; 
        $Regi_no_p1 = $regNoPart1;
        $Regi_no_p2 = $regNoPart2;
        $Fuel_type = $fuelType;
        
       
        $image_1 = $image1;
    
    
        // insertBooking($conn, $Booking_Date, $Return_Date, $Pickup_address, $VehicleID, $Vehicle_type, $Vehicle_make, 
        // $Vehicle_model, $Regi_no_p1, $Regi_no_p2, $Fuel_type, $colour, $CustomerID, $First_Name, $Last_Name, $contact_Number, 
        // $email, $image_1, $initialMileage);
    
        // Insert the booking into the database
        $insertQuery = "INSERT INTO bookings (Booking_Date, Return_Date, Pickup_address, VehicleID, Vehicle_type, Vehicle_make, 
                        Vehicle_model, Regi_no_p1, Regi_no_p2, Fuel_type, colour, CustomerID, First_Name, Last_Name, contact_Number, 
                        email, image_1, initialMileage) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $insertQuery);
    
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $Booking_Date, $Return_Date, $Pickup_address, $vehicleID, $Vehicle_type, 
            $Vehicle_make, $Vehicle_model, $Regi_no_p1, $Regi_no_p2, $Fuel_type, $colour, $CID, $First_Name, $Last_Name, 
            $contact_Number, $email, $image_1, $initialMileage);
    
        // Execute the statement
        mysqli_stmt_execute($stmt);
    
        // Get the auto-incremented Booking ID (BID)
        $BID = mysqli_insert_id($conn);
    
        // Store the Booking ID in the session or display it
        $_SESSION['BID'] = $BID;
        $_SESSION['Vehicle_type'] = $Vehicle_type;
        $_SESSION['Vehicle_make'] = $Vehicle_make;
        $_SESSION['Vehicle_model'] = $Vehicle_model;
        $_SESSION['initialMileage'] = $initialMileage;
        $_SESSION['Regi_no_p1'] = $Regi_no_p1;
        $_SESSION['Regi_no_p2'] = $Regi_no_p2;
        $_SESSION['Fuel_type'] = $Fuel_type;
        
    
        
        
    
      
    
        // echo "Your Booking ID is: " . $BID;
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        header("location: ../Payment Confirm/payment.php");
    
        // echo '<script language="javascript">';
        // echo 'alert("Your Booking ID is: " . $BID)';
        // echo '</script>';
        // Close the database connection
        mysqli_close($conn);
    
    }
    
    
    ?>