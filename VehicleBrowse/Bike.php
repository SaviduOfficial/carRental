<?php
// Connect to the database
include "../config.php";

session_start();

// Query to fetch vehicle details
$query = "SELECT * FROM registered_vehicles WHERE Vehicle_type = 'Bike'";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRS - Browse vehicles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Designs_styles copy.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script  src="Designs_script.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2"> <!-- Placeholder for logo -->
            VRS
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="../Home/home.php">Home</a>
            <a class="nav-link" href="../Bookings/Booking.php">Booking</a>
            <a class="nav-link" href="#">Contact</a>
            <span class="nav-link"><?php echo htmlspecialchars($_SESSION['username']); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
        </div>
    </nav>


    
    <section class="hero">
        <div class="container text-center text-white">
            <!-- <h1>“ Drive Your Way, Anytime, Anywhere with VRS ! ”</h1> -->
            <h1> Bikes Available at the Moment</h1>
            
            
        </div>
    </section>




        
    <section class="items">
        <div class="container">
            <div class="row">
                <?php
                // Loop through each vehicle in the result set and create a card for each one
                while ($row = $result->fetch_assoc()) {
                    $vehicleID = $row['VehicleID'];
                    $vehicleImage = $row['image_1'];  
                    $vehicleMake = $row['Vehicle_make'];   
                    $vehicleModel = $row['Vehicle_model'];  
                    $vehicleRentPrice = $row['Renatal_charge'];
                    $locationLabel = $row['location'];   
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="../Bookings/VehicleSelected.php?vehicleID=<?php echo $vehicleID; ?>" class="tile-link">
                            <img src="../Admin Interface/vehicleRegister/<?php echo $vehicleImage; ?>" class="card-img-top" alt="Vehicle Image">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $vehicleMake; ?></h5>
                            <p class="card-text">Model: <?php echo $vehicleModel; ?></p>
                            <h6 class="text-muted">Rate: <?php echo $vehicleRentPrice; ?></h6>
                            <br>
                            <h6 class="text-muted">
                                <i class="bi bi-geo-alt-fill red-icon"></i> <?php echo $locationLabel; ?>
                            </h6>
                            
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
            

    </div>
    
   
</body>
</html>