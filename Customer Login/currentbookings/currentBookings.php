<?php

include '../../config.php';
include '../../functions/func.php';

session_start();

$_SESSION['CID'];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="currentbook.css">
</head>
<body>
<?php

$customerID =   $_SESSION['CID'];   
showCustomerCurrentBooking($conn, $customerID);

?>


    
</body>
</html>