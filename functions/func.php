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
        $query = $link->prepare("SELECT passwords FROM userinfo WHERE username = ?;");
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
function rentalchargeforvehicle($eCapacityvalue){
    if($eCapacityvalue == "less than 100cc"){
        return "Rs.20.00 perKm + Rs.500.00";

    }elseif($eCapacityvalue == "100cc - 150 cc"){
        return "Rs.30.00 perKm + Rs.500.00";

    }elseif($eCapacityvalue == "151cc - 250cc"){
        return "Rs.30.00 perKm + Rs.1000.00";

    }elseif($eCapacityvalue == "251cc - 610cc"){
        return "Rs.40.00 perKm + Rs.1000.00";

    }elseif($eCapacityvalue == "611cc - 800cc"){
        return "Rs.40.00 perKm + Rs.1000.00";

    }elseif($eCapacityvalue == "801cc - 1000cc"){
        return "Rs.40.00 perKm + Rs.1500.00";

    }elseif($eCapacityvalue == "1001cc - 1300cc"){
        return "Rs.50.00 perKm + Rs.1500.00";

    }elseif($eCapacityvalue == "1301cc - 1500cc"){
        return "Rs.50.00 perKm + Rs. 2000.00";

    }elseif($eCapacityvalue == "1501cc - 2000cc"){
        return "Rs.80.00 perKm + Rs.2500.00";

    }elseif($eCapacityvalue == "2001cc - 2500cc"){
        return "Rs.100.00 perKm + Rs.3000.00";

    }elseif($eCapacityvalue == "2501cc - 3000cc"){
        return "Rs.100.00 perKm + Rs.4000.00";

    }elseif($eCapacityvalue == "more than 3000cc"){
        return "Rs.150.00 perKm + Rs.5000.00";

    }elseif($eCapacityvalue == "Electric"){
        return "Rs.80.00 perKm + Rs.2500.00";
    }


}


// Calculate Vehicle rental charge after a trip
function vehicleRental($Finalmileage, $cost, $addtional){
        $totalCost = $Finalmileage * $cost;
        $totalCost += $addtional;
        return $totalCost;
    
    }




// check uploads folder file names before saving

function checkFileExists($fileName, $uploadDir) {
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

function insertBooking($conn, $Booking_Date, $Return_Date, $Pickup_address, $VehicleID, $Vehicle_type, $Vehicle_make, 
$Vehicle_model, $Regi_no_p1, $Regi_no_p2, $Fuel_type, $colour, $CustomerID, $First_Name, $Last_Name, $contact_Number, 
$email, $image_1, $initialMileage) {

    $sql = "INSERT INTO bookings (Booking_Date, Return_Date, Pickup_address, VehicleID, Vehicle_type, Vehicle_make, 
    Vehicle_model, Regi_no_p1, Regi_no_p2, Fuel_type, colour, CustomerID, First_Name, Last_Name, contact_Number, 
    email, image_1, initialMileage)

            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssss", $Booking_Date, $Return_Date, $Pickup_address, $VehicleID, $Vehicle_type,
     $Vehicle_make, $Vehicle_model, $Regi_no_p1, $Regi_no_p2, $Fuel_type, $colour, $CustomerID, $First_Name, 
     $Last_Name, $contact_Number, $email, $image_1, $initialMileage);
    
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

function getBookingDetails($conn, $BID) {
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
            'BID', 'Booking_Date', 'Return_Date', 'Pickup_address', 
            'VehicleID', 'Vehicle_type', 'Vehicle_make', 'Vehicle_model', 
            'Regi_no_p1', 'Regi_no_p2', 'Fuel_type', 'colour', 
            'CustomerID', 'First_Name', 'Last_Name', 'contact_Number', 
            'email', 'paid_unpaid', 'Rental_charge', 'image_1', 
            'initialMileage', 'finalMileage'
        );

    } else {
        return null; // Return null if no data found
    }
}



//SUPER USER FUNCTIONS