<?php

include "../../config.php";
include "../../functions/func.php";

echo "before request method working";

$proceed = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit']) && !empty($_POST['additional_charge']) && !empty($_POST['ratePerKm']) && !empty($_POST['EngineCapacity'])  && !empty($_POST['ID'])){
        $proceed = true;
        echo "requestmethod working";
    }
}

if($proceed == true){

    $id = (int)$_POST['ID'];
    $additional = (float)$_POST['additional_charge'];
    $ratePerKm = (float)$_POST['ratePerKm'];
    $EngineCapacity = $_POST['EngineCapacity'];
    $proceed = false;



    $proceed = updateRentalCharge($conn, $id, $additional, $ratePerKm, $EngineCapacity);

    if($proceed == true){
        header('location: changerent.php');

    }else{
        echo "something went wrong";

   }
    

}


?>