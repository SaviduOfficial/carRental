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





//SUPER USER FUNCTIONS
