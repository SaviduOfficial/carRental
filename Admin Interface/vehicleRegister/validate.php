<?php

include "../../config.php";
include "../../functions/func.php";

// Directory to store uploaded images
$uploadDir = 'uploads/';

$proceed = false; 


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST['register']) == true && !empty($_POST['locationDis']) && !empty($_POST['vehicletype']) && !empty($_POST['firstName']) &&
    !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['phoneNumber']) && !empty($_POST['vehicleMake'])
    && !empty($_POST['vehicleModel']) && !empty($_POST['year']) && !empty($_POST['eCapacity']) && !empty($_POST['milage'])
    && !empty($_POST['regNoPrt1']) && !empty($_POST['regNoPrt2']) && !empty($_POST['fuelType'])&& !empty($_POST['transmission']) &&!empty($_POST['colour'])
    && !empty($_FILES['image1']['name']) && !empty($_FILES['image2']['name']) &&
    !empty($_FILES['image3']['name']) && !empty($_FILES['image4']['name']) && 
    !empty($_FILES['image5']['name']) && !empty($_FILES['image6']['name'])) {
    
    


        $proceed = true;
        
        
        
    }else{
        //header('location: ./RegisterVehicles.php');
        echo " error page works ";

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
        echo "Verification 1 complete <br>";
    }

    if(vehicleRegisterNumberP2($_POST['regNoPrt2']) == false){
        echo "Please check the Registration number again! <br> eg: 4562/8668/9321 <br>";
        $proceed = false;
    }else{
        echo "Verification 2 complete ";
    }

}else{
    echo "Something wrong check all the fields including images";
}


//check for conflicting files
// Check all images
$files = ['image1', 'image2', 'image3', 'image4', 'image5', 'image6'];
$conflictFound = false;

foreach ($files as $file) {
    // Check if the file exists
    if (isset($_FILES[$file]) && !empty($_FILES[$file]['name'])) {
        if (checkFileExists($_FILES[$file]['name'], $uploadDir)) {
            // If file exists, set conflict to true
            echo "File with the name " . $_FILES[$file]['name'] . " already exists. Please rename your file.<br>";
            $conflictFound = true;
            $proceed = false;
        }
    }
}



if ($proceed == true){

    // Define variables for image paths

     print_r($_FILES);
        $imgPaths = [];

        // Loop through uploaded image files and move them to the server directory
        for ($i = 1; $i <= 6; $i++) {
            $imgField = 'image' . $i;
            if (isset($_FILES[$imgField]) && $_FILES[$imgField]['error'] == 0) {
                $imgName = basename($_FILES[$imgField]['name']);
                $targetPath = $uploadDir . $imgName;

                // Move the uploaded file to the server directory
                if (move_uploaded_file($_FILES[$imgField]['tmp_name'], $targetPath)) {
                    // Store path in array if the upload was successful
                    $imgPaths[] = $targetPath;
                } else {
                    $imgPaths[] = ''; // Keep empty if upload fails
                }
            } else {
                $imgPaths[] = ''; // Keep empty if file not uploaded
            }
        }

        echo $imgPaths[0];
        echo $imgPaths[1];
        echo $imgPaths[2];
        echo $imgPaths[3];
        echo $imgPaths[4];
        echo $imgPaths[5];



        
    $locationd = $_POST['locationDis'];
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
    $transmission = $_POST["transmission"];
    $colour = $_POST['colour'];
    
    $availability = "yes";
    

   

    
    if(!empty($eCapacity)  && !empty($RentalCharge) && !empty($vehicleID)){
    $query = $conn->prepare('INSERT INTO registered_vehicles(VehicleID, Vehicle_type, First_Name, Last_Name, Owners_email, 
    Owners_contact_number, Vehicle_make, Vehicle_model, Model_year, Engine_capacity, Milage, Regi_No_p1, Regi_No_p2,
    Fuel_type,transmission, colour, availability, Renatal_charge, image_1,image_2, image_3, image_4, image_5, image_6,location) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);');

        $query->bind_param('sssssssssssssssssssssssss', ($vehicleID),  $vehicleType, $ownerfname, $ownerlname, $email, $phoneNumber, $vehicleMake, $vehicleModel, $year, 
         $eCapacity, $milage, $regNop1 , $regNop2, $fueltype,$transmission, $colour,$availability,$RentalCharge,  $imgPaths[0], $imgPaths[1], $imgPaths[2], 
         $imgPaths[3], $imgPaths[4], $imgPaths[5],$locationd);
        
         $query->execute();

        $query->close();

        $conn->close();

        header("location: ../admin_home.php");

    }else{
        echo "vehicle registration number, engine capaciy or rental charge is wrong";
    }

}

?>