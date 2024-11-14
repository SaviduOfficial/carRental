<?php


//validation of email
function emailvalidate($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else return true;
}

//validation of passsword
function passwordValidate($password)
{
    try {
        if (preg_match('/[a-zA-Z\d]{6,}$/', $password)) {
            return true;
        } else return false;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}


//validate mobile number
function phonenumValidate($phoneNumber)
{
    if (preg_match("/^\d{10}$/", $phoneNumber)) {
        return true;
    } else {
        echo "Phone number need to be 10 digits <br>";
        return false;
    }
}

//validate Vehicle Registration number
function vehicleRegisterNumberP1($vRegNumberp1)
{
    if (preg_match("/^[1-9A-Za-z][A-Za-z0-9]{0,3}$/", $vRegNumberp1)) {
        return true;
    } else {
        echo "Need to be less than 3 characters <br>";
        return false;
    }
}


//validate Vehicle Registration number
function vehicleRegisterNumberP2($vRegNumberp2)
{
    if (preg_match("/^\d{4}$/", $vRegNumberp2)) {
        return true;
    } else {
        echo "Need to be 4 digit number <br>";
        return false;
    }
}



//Username validation
function usernameValidate($username, $link, $tablemame)
{
    if (preg_match("/[\s]/", $username)) {
        return false;
    } else {
        $query = $link->prepare("SELECT username FROM $tablemame WHERE username = ?;");

        try {
            if ($query === false) {
                die("prepare failed: " . $link->error);
            }

            $query->bind_param('s', $username);

            $query->execute();

            $result = $query->get_result();

            if ($result->num_rows > 0) {
                // get data of row
                while ($row = $result->fetch_assoc()) {
                    $uname = $row["username"];
                }
                if ($uname == $username) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }

            $link->close();
        } catch (Exception $e) {
            echo "<br> <h3> Error: " . $e->getMessage() . " <h3/>";
            return false;
        }
    }
}




//check Password from database when login
function passwordCheck($password, $link, $uname)
{
    if (passwordValidate($password)) {
        $query = $link->prepare("SELECT Customer_password FROM customers WHERE username = ?;");
        try {
            if ($query === false) {
                die("prepare failed: " . $link->error);
            }

            $query->bind_param('s', $uname);
            $query->execute();

            $result = $query->get_result();

            if ($result->num_rows > 0) {
                // get data of row
                while ($row = $result->fetch_assoc()) {
                    $dbpword = $row["passwords"];
                }
                if ($password == $dbpword) {
                    return true;
                } else {
                    return false;
                    echo "Please check the password again!";
                }
            }
        } catch (Exception $e) {
            echo "<br> <h3> Error: " . $e->getMessage() . " <h3/>";
            return false;
        }
    } else {
        echo "Please check the password again!";
        return false;
    }
}



//initial rental charge for a vehicle
function rentalchargeforvehicle($eCapacityvalue)
{

    $result = getRentalChargeRate($eCapacityvalue);

    if ($result) {
        $ratePerKm = $result['ratePerKm'];
        $additionalCharge = $result['additional_charge'];
   
        if ($eCapacityvalue == "less than 100cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "100cc - 150 cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "151cc - 250cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "251cc - 610cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "611cc - 800cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "801cc - 1000cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "1001cc - 1300cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "1301cc - 1500cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "1501cc - 2000cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "2001cc - 2500cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "2501cc - 3000cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "more than 3000cc") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        } elseif ($eCapacityvalue == "Electric") {
            return "Rs.$ratePerKm perKm + Rs.$additionalCharge";
        }
    } else {
        echo "Data not found or error occurred."; //check this works and make a function to change rates by admin
    }
}

//In the vehicle register table to assign values get form rental charge table to vehicles
function getRentalChargeRate($eCapacityvalue)
{
    // Include the database configuration file
    include "../config.php"; // Update with the correct path to your config file

    // Prepare the query to fetch ratePerKm and additional_charge for the specified EngineCapacity
    $query = "SELECT ratePerKm, additional_charge FROM rentalcharge WHERE EngineCapacity = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $eCapacityvalue); // "s" specifies that $eCapacityvalue is a string

    // Execute the query
    if ($stmt->execute()) {
        // Bind the result to PHP variables
        $stmt->bind_result($ratePerKm, $additional_charge);

        // Fetch the result
        if ($stmt->fetch()) {
            // Close the statement and connection
            $stmt->close();
            $conn->close();

            // Return the results as an associative array
            return [
                'ratePerKm' => $ratePerKm,
                'additional_charge' => $additional_charge
            ];
        } else {
            echo "No data found for EngineCapacity: $eCapacityvalue.";
        }
    } else {
        echo "Error executing query.";
    }

    // Close the statement and connection in case of failure
    $stmt->close();
    $conn->close();

    return null; // Return null if no data found or on error
}


//rental charge calculation function part 1
function totalAmount($vehicleID, $initialMilage, $finalMilage, $ecapacity) {
    include "../config.php";
    global $conn; // Use the database connection established in config.php

    // Calculate the mileage driven
    $mileageDriven = $finalMilage - $initialMilage;

    // Query the rentalcharge table to get ratePerKm and additional_charge for the provided engine capacity
    $query = "SELECT ratePerKm, additional_charge FROM rentalcharge WHERE EngineCapacity = ?";
    $stmt3 = $conn->prepare($query);
    $stmt3->bind_param("s", $ecapacity);

    if ($stmt3->execute()) {
        $stmt3->bind_result($ratePerKm, $additional_charge);
        if ($stmt3->fetch()) {
            // Calculate the total rental charge using vehicleRentalAmount function
            $totalCost = vehicleRentalAmount($mileageDriven, $ratePerKm, $additional_charge);
            $stmt3->close();

            // Update the bookings table with the calculated rental charge
            $initialMilage = (string)$initialMilage;
            $finalMilage =  (string)$finalMilage;
            $totalCost = (string)$totalCost;

            $updateQuery = "UPDATE bookings SET Rental_chage = ? WHERE VehicleID = ? AND initialMileage = ? AND finalMileage = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("ssss", $totalCost, $vehicleID, $initialMilage, $finalMilage);//convert to string

            if ($updateStmt->execute()) {
                echo "Booking record updated successfully with the total rental charge: $totalCost";
            } else {
                echo "Error updating the booking record.";
            }

            $updateStmt->close();
        } else {
            echo "No rental charge record found for engine capacity: $ecapacity.";
        }
    } else {
        echo "Error executing rental charge query.";
    }

    
}



// Calculate rental charge function part 2
function vehicleRentalAmount($MilageDriven, $RatePerkm, $addtional)
{
    $totalCost = $MilageDriven * $RatePerkm;
    $totalCost += $addtional;
    return $totalCost;
}




// check uploads folder file names before saving

function checkFileExists($fileName, $uploadDir)
{
    // Check if the file already exists in the directory
    $targetFile = $uploadDir . basename($fileName);

    if (file_exists($targetFile)) {
        // Return true if file exists, so you can show the message
        return true;
    } else {
        // Return false if file does not exist
        return false;
    }
}


//Booking Confirmation

function insertBooking(
    $conn,
    $Booking_Date,
    $Return_Date,
    $Pickup_address,
    $VehicleID,
    $Vehicle_type,
    $Vehicle_make,
    $Vehicle_model,
    $Regi_no_p1,
    $Regi_no_p2,
    $Fuel_type,
    $colour,
    $CustomerID,
    $First_Name,
    $Last_Name,
    $contact_Number,
    $email,
    $image_1,
    $initialMileage
) {

    $sql = "INSERT INTO bookings (Booking_Date, Return_Date, Pickup_address, VehicleID, Vehicle_type, Vehicle_make, 
    Vehicle_model, Regi_no_p1, Regi_no_p2, Fuel_type, colour, CustomerID, First_Name, Last_Name, contact_Number, 
    email, image_1, initialMileage)

            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssssss",
        $Booking_Date,
        $Return_Date,
        $Pickup_address,
        $VehicleID,
        $Vehicle_type,
        $Vehicle_make,
        $Vehicle_model,
        $Regi_no_p1,
        $Regi_no_p2,
        $Fuel_type,
        $colour,
        $CustomerID,
        $First_Name,
        $Last_Name,
        $contact_Number,
        $email,
        $image_1,
        $initialMileage
    );

    if ($stmt->execute()) {
        echo "Booking inserted successfully.";
        // Get the last inserted ID (BID)
        $BID = $conn->insert_id;

        // Store BID in session to access it on the receipt page
        $_SESSION['BID'] = $BID;
        /*header("location: ./BookingRecipt");*/
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}




// for the Booking Receipt

function getBookingDetails($conn, $BID)
{
    // Prepare the SQL query to retrieve all data from the bookings table for a specific BID
    $sql = "SELECT * FROM bookings WHERE BID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $BID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data is found, fetch it, and assign to variables
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Assign each field to a PHP variable
        $BID = $row['BID'];
        $Booking_Date = $row['Booking_Date'];
        $Return_Date = $row['Return_Date'];
        $Pickup_address = $row['Pickup_address'];
        $VehicleID = $row['VehicleID'];
        $Vehicle_type = $row['Vehicle_type'];
        $Vehicle_make = $row['Vehicle_make'];
        $Vehicle_model = $row['Vehicle_model'];
        $Regi_no_p1 = $row['Regi_no_p1'];
        $Regi_no_p2 = $row['Regi_no_p2'];
        $Fuel_type = $row['Fuel_type'];
        $colour = $row['colour'];
        $CustomerID = $row['CustomerID'];
        $First_Name = $row['First_Name'];
        $Last_Name = $row['Last_Name'];
        $contact_Number = $row['contact_Number'];
        $email = $row['email'];
        $paid_unpaid = $row['paid_unpaid'];
        $Rental_charge = $row['Rental_chage'];
        $image_1 = $row['image_1'];
        $initialMileage = $row['initialMileage'];
        $finalMileage = $row['finalMileage'];

        // Return an associative array of all the variables
        return compact(
            'BID',
            'Booking_Date',
            'Return_Date',
            'Pickup_address',
            'VehicleID',
            'Vehicle_type',
            'Vehicle_make',
            'Vehicle_model',
            'Regi_no_p1',
            'Regi_no_p2',
            'Fuel_type',
            'colour',
            'CustomerID',
            'First_Name',
            'Last_Name',
            'contact_Number',
            'email',
            'paid_unpaid',
            'Rental_charge',
            'image_1',
            'initialMileage',
            'finalMileage'
        );
    } else {
        return null; // Return null if no data found
    }
}



//SUPER USER FUNCTIONS

// change avilability of vehicles

function changeAvailability($vehicleID, $availability){

    include "../config.php";
    $proceed = false;

      $stmt = $conn->prepare("UPDATE registered_vehicles SET availability = ? WHERE VehicleID = ?");
        $stmt->bind_param("ss", $availability, $vehicleID); 

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Availability updated successfully";
            $proceed = true;
            return $proceed;
        } else {
            echo "Error updating availability: " . $stmt->error;
        }

// Close the statement
$stmt->close();
    

}