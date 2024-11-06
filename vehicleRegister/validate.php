<?php

include "../config.php";
include "../functions/func.php";

$proceed = false; 


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST['register']) == true && !empty($_POST['vehicletype']) && !empty($_POST['firstName']) &&
    !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['phoneNumber']) && !empty($_POST['vehicleMake'])
    && !empty($_POST['vehicleModel']) && !empty($_POST['year']) && !empty($_POST['eCapacity']) && !empty($_POST['milage'])
    && !empty($_POST['regNoPrt1']) && !empty($_POST['regNoPrt2']) && !empty($_POST['fuelType'])&& !empty($_POST['colour'])
    && !empty($_POST['image1']) && !empty($_POST['image2']) && !empty($_POST['image3']) && !empty($_POST['image4']) && !empty($_POST['image5']) && 
    !empty($_POST['image6'])){
        $proceed = true;
        
        
        
    }else{
        //header('location: ./index.php');
        echo " error page works";

    }
}

// validation of email, phone number
if($proceed == true){

    if(emailvalidate($_POST['email']) == false){
        echo "please check the email again! <br> eg: example@gmail.com  <br> <br>";
        $proceed = false;
    }else{
        $email = $_POST['email'];
    }

    if(phonenumValidate($_POST['phoneNumber']) == false){
        echo "Please check the phone number again! <br> eg: 0712258852  <br>";
        $proceed = false;
    }else{
        $phoneNumber = $_POST['phoneNumber'];
    }
    

    if(vehicleRegisterNumberP1($_POST['regNoPrt1']) == false){
        echo "Please check the Registration number again! <br>  eg: abs/300/52 <br>";
        $proceed = false;
    }else{
        echo "reg no 1 works fine <br>";
    }

    if(vehicleRegisterNumberP2($_POST['regNoPrt2']) == false){
        echo "Please check the Registration number again! <br> eg: 4562/8668/9321 <br>";
        $proceed = false;
    }else{
        echo "reg no 2 works fine";
    }

}else{
    echo "Something wrong with the request method";
}


if ($proceed == true){

    $vehicleType = $_POST['vehicletype'];
    $ownerfname = $_POST['firstName'];
    $ownerlname = $_POST['lastName'];
    $vehicleMake = $_POST['vehicleMake'];
    $vehicleModel = $_POST['vehicleModel'];
    $year = $_POST['year'];

    $eCapacity = $_POST['eCapacity'];

    $RentalCharge = rentalchargeforvehicle($eCapacity);

    $milage = $_POST['milage'];
    $regNop1 = $_POST['regNoPrt1'];
    $regNop2 = $_POST['regNoPrt2'];
    $vehicleID = $regNop1 . $regNop2;
    $fueltype = $_POST['fuelType'];
    $colour = $_POST['colour'];
    $img1 = $_POST['image1'];
    $img2 = $_POST['image2'];
    $img3 = $_POST['image3'];
    $img4 = $_POST['image4'];
    $img5 = $_POST['image5'];
    $img6 = $_POST['image6'];
    $availability = "yes";
    

   

    
    if(!empty($eCapacity)  && !empty($RentalCharge) && !empty($vehicleID)){
    $query = $conn->prepare('INSERT INTO registered_vehicles(VehicleID, Vehicle_type, First_Name, Last_Name, Owners_email, 
    Owners_contact_number, Vehicle_make, Vehicle_model, Model_year, Engine_capacity, Milage, Regi_No_p1, Regi_No_p2,
    Fuel_type, colour, availability, Renatal_charge, image_1,image_2, image_3, image_4, image_5, image_6) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);');

        $query->bind_param('sssssssssssssssssssssss', ($vehicleID), $vehicleType, $ownerfname, $ownerlname, $email, $phoneNumber, $vehicleMake, $vehicleModel, $year, 
         $eCapacity, $milage, $regNop1 , $regNop2, $fueltype, $colour,$availability,$RentalCharge, $img1, $img2, $img3, $img4, $img5, $img6 );
        
         $query->execute();

        $query->close();

        $conn->close();
    }else{
        echo "vehicle registration number, engine capaciy or rental charge is wrong";
    }

}

?>