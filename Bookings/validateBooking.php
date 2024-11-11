<?php

// Connect to the database
include "../config.php";
include "../functions/func.php";

session_start();

$_SESSION['VehicleID'];

$vehicleID = $_SESSION['VehicleID'];

$customerID = $_SERVER['CustomerID'];

echo $_SESSION['VehicleID'];

echo $vehicleID;


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
    echo "Vehicle Type: " . $vehicleType . "<br>";
    echo "Make: " . $vehicleMake . "<br>";
    echo "Model: " . $vehicleModel . "<br>";
    echo "Mileage: " . $mileage . "<br>";
    echo "Registration Part 1: " . $regNoPart1 . "<br>";
    echo "Registration Part 2: " . $regNoPart2 . "<br>";
    echo "Fuel Type: " . $fuelType . "<br>";
    echo "Color: " . $color . "<br>";
    echo "Rental Charge: " . $rentalCharge . "<br>";
    echo "Image Path: " . $image1 . "<br>";
} else {
    echo "No vehicle found with ID: " . $VehicleID;
}

// Close the database connection
mysqli_close($conn);



$proceed = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['confirm']) && !empty($_POST['fname'])  && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['contactNumber'])
    && !empty($_POST['pickupdate']) && !empty($_POST['returndate']) && !empty($_POST['pickupAddress'])){
        echo "confirm evrithing works fine works";
        $proceed = true;
    }else{
        header("location: ./Booking.php");
    }

}


if($proceed == true){
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


    insertBooking($conn, $Booking_Date, $Return_Date, $Pickup_address, $VehicleID, $Vehicle_type, $Vehicle_make, 
    $Vehicle_model, $Regi_no_p1, $Regi_no_p2, $Fuel_type, $colour, $CustomerID, $First_Name, $Last_Name, $contact_Number, 
    $email, $image_1, $initialMileage);
}


?>