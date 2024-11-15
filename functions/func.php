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






function showCustomerBookingHistory($conn, $customerID) {
    // Query to get booking history for a specific customer
    $query = "SELECT * FROM bookings WHERE CustomerID = ? AND paid_unpaid = ?";
    
    $paid_unpaid = "paid";

    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $customerID, $paid_unpaid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any bookings
    if ($result->num_rows > 0) {
        echo "<h2 class='booking-header'>Your Booking History</h2>";
        
        // Start scrollable container
        echo "<div class='table-container'>";
        
        // Start the table structure
        echo "<table class='booking-history-table'>";
        echo "<thead>";
        echo "<tr>
                <th>Booking ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pickup Address</th>
                <th>Vehicle ID</th>
                <th>Vehicle Type</th>
                <th>Vehicle Make</th>
                <th>Vehicle Model</th>
                <th>License Plate</th>
                <th>Fuel Type</th>
                <th>Colour</th>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Payment Status</th>
                <th>Amount</th>
                <th>Starting Mileage</th>
                <th>Ending Mileage</th>
              </tr>";
        echo "</thead><tbody>";

        // Loop through each booking and create a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['BID'] . "</td>";
            echo "<td>" . $row['Booking_Date'] . "</td>";
            echo "<td>" . $row['Return_Date'] . "</td>";
            echo "<td>" . $row['Pickup_address'] . "</td>";
            echo "<td>" . $row['VehicleID'] . "</td>";
            echo "<td>" . $row['Vehicle_type'] . "</td>";
            echo "<td>" . $row['Vehicle_make'] . "</td>";
            echo "<td>" . $row['Vehicle_model'] . "</td>";
            echo "<td>" . $row['Regi_no_p1'] . " - " . $row['Regi_no_p2'] . "</td>";
            echo "<td>" . $row['Fuel_type'] . "</td>";
            echo "<td>" . $row['colour'] . "</td>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['First_Name'] . "</td>";
            echo "<td>" . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['contact_Number'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['paid_unpaid'] . "</td>";
            echo "<td>" . $row['Rental_chage'] . "</td>";
            echo "<td>" . $row['initialMileage'] . "</td>";
            echo "<td>" . $row['finalMileage'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>"; // Close table structure
        echo "</div>"; // Close scrollable container
    } else {
        echo "<p>No booking history found.</p>";
    }

    // Close the statement
    $stmt->close();
}


//customer history
function showCustomerCurrentBooking($conn, $customerID) {
    // Query to get booking history for a specific customer
    $query = "SELECT * FROM bookings WHERE CustomerID = ? AND paid_unpaid = ?";
    
    $paid_unpaid = "unpaid";
    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $customerID ,  $paid_unpaid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any bookings
    if ($result->num_rows > 0) {
        echo "<h2 class='booking-header'>Your Current Bookings </h2>";
        
        // Loop through each booking and create a vertical table for each one
        while ($row = $result->fetch_assoc()) {
            echo "<div class='booking-card'>";
            echo "<table class='booking-history-table'>";
            echo "<tr><th>Booking ID</th><td>" . $row['BID'] . "</td></tr>";
            echo "<tr><th>Start Date</th><td>" . $row['Booking_Date'] . "</td></tr>";
            echo "<tr><th>End Date</th><td>" . $row['Return_Date'] . "</td></tr>";
            echo "<tr><th>Pick Up Address</th><td>" . $row['Pickup_address'] . "</td></tr>";
            echo "<tr><th>Vehicle ID</th><td>" . $row['VehicleID'] . "</td></tr>";
            echo "<tr><th>Vehicle Type</th><td>" . $row['Vehicle_type'] . "</td></tr>";
            echo "<tr><th>Vehicle Make</th><td>" . $row['Vehicle_make'] . "</td></tr>";
            echo "<tr><th>Vehicle Model</th><td>" . $row['Vehicle_model'] . "</td></tr>";
            echo "<tr><th>License Plate</th><td>" . $row['Regi_no_p1'] . " - " . $row['Regi_no_p2'] . "</td></tr>";
            echo "<tr><th>Fuel Type</th><td>" . $row['Fuel_type'] . "</td></tr>";
            echo "<tr><th>Colour</th><td>" . $row['colour'] . "</td></tr>";
            echo "<tr><th>Customer ID</th><td>" . $row['CustomerID'] . "</td></tr>";
            echo "<tr><th>First Name</th><td>" . $row['First_Name'] . "</td></tr>";
            echo "<tr><th>Last Name</th><td>" . $row['Last_Name'] . "</td></tr>";
            echo "<tr><th>Contact Number</th><td>" . $row['contact_Number'] . "</td></tr>";
            echo "<tr><th>Email</th><td>" . $row['email'] . "</td></tr>";
            echo "<tr><th>Payment Status</th><td>" . $row['paid_unpaid'] . "</td></tr>";
            echo "<tr><th>Amount</th><td>" . $row['Rental_chage'] . "</td></tr>";
            echo "<tr><th>Starting Mileage</th><td>" . $row['initialMileage'] . "</td></tr>";
            echo "<tr><th>Ending Mileage</th><td>" . $row['finalMileage'] . "</td></tr>";
            echo "</table>";
            echo "</div>";
        }
    } else {
        echo "<p>No bookings found.</p>";
    }

    // Close the statement
    $stmt->close();
}


//  update rental charges
function updateRentalCharge($conn, $id, $additional, $ratePerKm, $EngineCapacity) {
    $query = "UPDATE rentalcharge 
              SET ratePerKm = ?, additional_charge = ? 
              WHERE ID = ? AND EngineCapacity = ?";

              $id = (int)$id;
              $additional = (float)$additional;
              $ratePerKm = (float)$ratePerKm;
              $EngineCapacity = (string)$EngineCapacity;
    
    $stmt1 = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt1 === false) {
        die("Error preparing the query: " . $conn->error);
        
    }

    // Bind the parameters to the prepared statement
    $stmt1->bind_param("ddis", $ratePerKm, $additional , $id, $EngineCapacity);

    // Execute the statement and check for success
    if ($stmt1->execute()) {
        echo "Rental charge updated successfully.";
        return true;
        
        
    } else {
        echo "Error updating rental charge: " . $stmt1->error;
        
    }

    // Close the statement
    $stmt1->close();
}


//  update Payment status of customers
function updatePaymentstatus($conn, $bid, $cid, $paid_unpaid) {
    $query = "UPDATE bookings 
              SET paid_unpaid = ? 
              WHERE BID = ? AND CustomerID = ?";           
    
    $stmt1 = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt1 === false) {
        die("Error preparing the query: " . $conn->error);
        
    }

    // Bind the parameters to the prepared statement
    $stmt1->bind_param("sss", $paid_unpaid, $bid , $cid);

    // Execute the statement and check for success
    if ($stmt1->execute()) {
        echo "Rental charge updated successfully.";
        return true;
        
        
    } else {
        echo "Error updating rental charge: " . $stmt1->error;
        
    }

    // Close the statement
    $stmt1->close();
}



