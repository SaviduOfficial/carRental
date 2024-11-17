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
    <title>Current Bookings</title>
    <link rel="stylesheet" href="currentbook.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../../VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2"> <!-- Placeholder for logo -->
            VRS
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="../Home/home.php">Home</a>
            <a class="nav-link" href="../Bookings/Booking.php">Booking</a>
            <a class="nav-link" href="#">Contact</a>
            <span class="nav-link"><?php echo htmlspecialchars($_SESSION['username']); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
        </div>
    </nav>
    <br>
    <br>
<?php

$customerID =   $_SESSION['CID'];   
showCustomerCurrentBooking($conn, $customerID);

?>


    
</body>
</html>