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

// amount assign

function ammountAssign($units)
{


    if ($units > 0 && $units < 61) {
        $chargePerUnit = UnitCharge($units, 1);
        $temp = $units;
        $amount = $temp * $chargePerUnit;
        //$_SESSION['amount'] = $amount;
        return $amount;
    } else if ($units > 60 && $units < 91) {
        $chargePerUnit = UnitCharge($units, 2);
        $temp = $units - 60;
        $amount = $temp * $chargePerUnit;
        //$_SESSION['amount'] = $amount;
        return $amount;
    } else if ($units > 90 && $units < 121) {
        $chargePerUnit = UnitCharge($units, 3);
        $temp = $units - 90;
        $amount = $temp * $chargePerUnit;
        //$_SESSION['amount'] = $amount;
        return $amount;
    } else if ($units > 120 && $units < 181) {
        $chargePerUnit = UnitCharge($units, 4);
        $temp = $units - 120;
        $amount = $temp * $chargePerUnit;
        //$_SESSION['amount'] = $amount;
        return $amount;
    } else if ($units > 180) {
        $chargePerUnit = UnitCharge($units, 5);
        $temp = $units - 180;
        $amount = $temp * $chargePerUnit;
        //$_SESSION['amount'] = $amount;
        return $amount;
    } else {
        echo "Please enter valid Number";
    }
}





//usage assign 
function usageAssign($units)
{

    if ($units > 0 && $units < 61) {
        $temp = $units;
        $_SESSION['units'] = 0;
        return $temp;
    } else if ($units > 60 && $units < 91) {
        $temp = $units - 60;
        $units = $units - $temp;
        $_SESSION['units'] = $units;
        return $temp;
    } else if ($units > 90 && $units < 121) {
        $temp = $units - 90;
        $units = $units - $temp;
        $_SESSION['units'] = $units;
        return $temp;
    } else if ($units > 120 && $units < 181) {
        $temp = $units - 120;
        $units = $units - $temp;
        $_SESSION['units'] = $units;
        return $temp;
    } else if ($units > 180) {
        $temp = $units - 180;
        $units = $units - $temp;
        $_SESSION['units'] = $units;
        return $temp;
    } else {
        echo "Please enter valid Number";
    }
}


//unit usage calculator
function unitUsage($units)
{

    $amount = 0;
    $temp = 0;
    $FixedCharge = 0;


    if ($units > 180) {
        $FixedCharge = FixCharge($units, 5);
    } else if ($units > 120) {
        $FixedCharge = FixCharge($units, 4);
    } else if ($units > 90) {
        $FixedCharge = FixCharge($units, 3);
    } else if ($units > 60) {
        $FixedCharge = FixCharge($units, 2);
    } else if ($units > 0) {
        $FixedCharge = FixCharge($units, 1);
    } else {
        echo "Please enter valid Number";
    }

    while ($units > 0) {
        if ($units > 180) {
            $chargePerUnit = UnitCharge($units, 5);
            $temp = $units - 180;
            $amount = $amount + ($temp * $chargePerUnit);
            $units = $units - $temp;
        } else if ($units > 120) {
            $chargePerUnit = UnitCharge($units, 4);
            $temp = $units - 120;
            $amount = $amount + ($temp * $chargePerUnit);
            $units = $units - $temp;
        } else if ($units > 90) {
            $chargePerUnit = UnitCharge($units, 3);
            $temp = $units - 90;
            $amount = $amount + ($temp * $chargePerUnit);
            $units = $units - $temp;
        } else if ($units > 60) {
            $chargePerUnit = UnitCharge($units, 2);
            $temp = $units - 60;
            $amount = $amount + ($temp * $chargePerUnit);
            $units = $units - $temp;
        } else if ($units > 0 && $units < 61) {
            $chargePerUnit = UnitCharge($units, 1);
            $temp = $units;
            $amount = $amount + ($temp * $chargePerUnit);
            $units = $units - $temp;
        } else {
            echo "Please enter valid Number";
        }
    }

    $_SESSION['FixedCharge'] = $FixedCharge;
    //adding fixed charge
    return $amount;
}



//get Unit Charge
function UnitCharge($units, $id_no)
{

    $link = mysqli_connect('localhost', 'root', '', 'waterbills');

    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    $query = $link->prepare("SELECT energy_charge_lkr_kWh, fixed_charge_LKR_month FROM water_bill_units WHERE id_no=?;");
    $query->bind_param('i', $id_no);
    $query->execute();

    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // get data of row
        while ($row = $result->fetch_assoc()) {
            $chargePerUnit = $row["energy_charge_lkr_kWh"];
            return $chargePerUnit;
        }
    } else {
        echo "Something worng with query or water bill units table";
    }
}

//Get Fixcharge
function FixCharge($units, $id_no)
{

    $link = mysqli_connect('localhost', 'root', '', 'waterbills');

    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    $query = $link->prepare("SELECT energy_charge_lkr_kWh, fixed_charge_LKR_month FROM water_bill_units WHERE id_no=?;");
    $query->bind_param('i', $id_no);
    $query->execute();

    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // get data of row
        while ($row = $result->fetch_assoc()) {
            $FixedCharge = $row["fixed_charge_LKR_month"];
            return $FixedCharge;
        }
    } else {
        echo "Something worng with query or water bill units table";
    }
}


// check the year
function yearValidate($year)
{
    if ($year > 2024) {
        return false;
    } else if ($year < 1990) {
        return false;
    } else {
        return true;
    }
}

//check the month
function monthValidate($month)
{
    if ($month < 0) {
        return false;
    } else if ($month > 12) {
        return false;
    } else {
        return true;
    }
}

//validate units

function unitValidate($units)
{
    if (preg_match('/a-zA-Z/', $units)) {

        return false;
    } else if ($units > 50000) {

        return false;
    } else {
        return true;
    }
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
