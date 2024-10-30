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



// Calculate Vehicle rental charge
function vehicleRental($Finalmileage, $cost, $addtional){
        $totalCost = $Finalmileage * $cost;
        $totalCost += $addtional;
        return $totalCost;
    
    }





//SUPER USER FUNCTIONS

//change  charge for each range 
function changeCharge($range, $charge)
{

    try {
        $link = mysqli_connect('localhost', 'root', '', 'waterbills');

        $query = $link->prepare("UPDATE water_bill_units SET energy_charge_lkr_kWh=$charge  WHERE id_no=?;");

        if ($range == 1) {
            $query->bind_param('i', $range);
            $query->execute();
            $query->close();
            $link->close();
        } else if ($range == 2) {
            $query->bind_param('i', $range);
            $query->execute();
            $query->close();
            $link->close();
        } else if ($range == 3) {
            $query->bind_param('i', $range);
            $query->execute();
            $query->close();
            $link->close();
        } else if ($range == 4) {
            $query->bind_param('i', $range);
            $query->execute();
            $query->close();
            $link->close();
        } else if ($range == 1) {
            $query->bind_param('i', $range);
            $query->execute();
            $query->close();
            $link->close();
        } else {
            echo 'something went wrong';
        }


        return true;
    } catch (Exception $e) {
        echo "<br> <h3> Error: " . $e->getMessage() . " <h3/>";
        return false;
    }
}
