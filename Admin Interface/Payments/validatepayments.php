<?php

include "../../config.php";
include "../../functions/func.php";

// echo "before request method ";

$proceed = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit']) && !empty($_POST['bid']) && !empty($_POST['cid']) && !empty($_POST['amount'])  && 
    !empty($_POST['paid_unpaid'])){
        $proceed = true;
        echo "requestmethod working";
    }
}

if($proceed == true){

    $bid = $_POST['bid'];
    $cid = $_POST['cid'];
    $paid_unpaid = $_POST['paid_unpaid'];
    $proceed = false;



    $proceed = updatePaymentstatus($conn, $bid, $cid, $paid_unpaid);

    if($proceed == true){
        header('location: payemntdata.php');

    }else{
        echo "something went wrong";

   }
    

}


?>