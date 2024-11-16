<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['adusername'])) {
    header("Location: ../Customer Login/customer_login.php"); // Redirect to login page if not logged in
    exit;
}

$adusername = $_SESSION['adusername']; // Retrieve the username from the session
/*echo $adusername;*/
?>
<?php /*echo $adusername;*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRS - Vehicle Rental System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylehome.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin_home.php">
            <img src="VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2"> <!-- Placeholder for logo -->
            VRS
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="admin_home.php">Home</a>
            
            <a class="nav-link" href="../Admin Interface/admin_registration.php">Create Admin</a>
            <span class="nav-link"><?php echo htmlspecialchars($adusername); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center text-white">
            <h1>“ Drive Your Way, Anytime, Anywhere with VRS ! ”</h1>
            <p>You Are Now Logged in as an Admin! </p>
            
           
        </div>
    </section>

    <!-- Vehicle Cards -->
    <section class="vehicles py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card vehicle-card">
                         <img src="../Admin Interface/images_1/register.JPG" class="card-img-top" alt="register">
                        <div class="card-body text-center">
                            <h5 class="card-title">Register Vehicles</h5>
                            <a href="../Admin Interface/vehicleRegister/RegisterVehicles.php">
                                <button class="btn btn-warning">REGISTER</button>
                            </a>
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="../Admin Interface/images_1/updatevehicle.jpg" class="card-img-top" alt="update">
                        <div class="card-body text-center">
                             <h5 class="card-title">Update Vehicle Details</h5>
                            <a href="../Admin Interface/UpdateVehicleDetails/searchInterface.php">
                                <button class="btn btn-warning">UPDATE</button>
                            </a>
                            
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="../Admin Interface/images_1/repair.jpg" class="card-img-top" alt="availability">
                         <div class="card-body text-center">
                            <h5 class="card-title">Change Availability</h5> 
                            <a href="../Admin Interface/ChangeAvailability/searchforvehicle.php">
                                <button class="btn btn-warning">AVAILABILITY</button>
                            </a>
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                       <img src="../Admin Interface/images_1/delete.jpg" class="card-img-top" alt="delete">
                          <div class="card-body text-center">
                            <h5 class="card-title">Delete Vehicles</h5>                        
                            <a href="../Admin Interface/DeleteVehicles/searchInterface.php">
                                <button class="btn btn-warning">DELETE</button>
                            </a>
                        </div> 
                    </div>
                </div>
                
        </div>
    </section>

    <section class="vehicles py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card vehicle-card">
                    <img src="../Admin Interface/images_1/payments.jpg" class="card-img-top" alt="payments">
                        <div class="card-body text-center">
                            <h5 class="card-title">User payments</h5>                        
                            <a href="../Admin Interface/Payments/payemntdata.php">
                                <button class="btn btn-warning">PAYAMENTS</button>
                            </a>
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="../Admin Interface/images_1/rentalcharge.jpg" class="card-img-top" alt="rental">
                          <div class="card-body text-center">
                            <h5 class="card-title">Change Renatal </h5>                        
                            <a href="../Admin Interface/changeRentalCharges/changerent.php">
                                <button class="btn btn-warning">Renatal Charges</button>
                            </a>
                            
                        </div> 
                    </div>
                </div>
                
                    
        </div>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
