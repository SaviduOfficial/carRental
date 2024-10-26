<?php

include "../functions/func.php";

$proceed = false; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $proceed = true;
    if(isset($_POST['register']) == true && !empty($_POST['vehicletype']) && !empty($_POST['firstName']) &&
    !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['phoneNumber']) && !empty($_POST['vehicleMake'])
    && !empty($_POST['vehicleModel']) && !empty($_POST['year']) && !empty($_POST['eCapacity']) && !empty($_POST['milage'])
    && !empty($_POST['regNoPrt1']) && !empty($_POST['regNoPrt2']) && !empty($_POST['fuelType'])&& !empty($_POST['colour'])
    && !empty($_POST['image1']) && !empty($_POST['image2']) && !empty($_POST['image3']) && !empty($_POST['image4'])){
        
    }else{
        //header('location: ./index.php');
        echo " error page works";

    }
}

// validation of email, phone number
if($proceed == true){

    if(emailvalidate($_POST['email']) == false){
        echo "please check the email again! <br> eg: example@gmail.com  <br> <br>";
    }else{
        $email = $_POST['email'];
    }

    if(phonenumValidate($_POST['phoneNumber']) == false){
        echo "Please check the phone number again! <br> eg: 0712258852  <br>";
    }else{
        $phoneNumber = $_POST['phoneNumber'];
    }
    

    if(vehicleRegisterNumberP1($_POST['regNoPrt1']) == false){
        echo "Please check the Registration number again! <br>  eg: abs/300/52 <br>";
    }else{
        echo "reg no 1 works fine <br>";
    }

    if(vehicleRegisterNumberP2($_POST['regNoPrt2']) == false){
        echo "Please check the Registration number again! <br> eg: 4562/8668/9321 <br>";
    }else{
        echo "reg no 2 works fine";
    }




}else{
    echo "Something wrong with the request method";
}

?>