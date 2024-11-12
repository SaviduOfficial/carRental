<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../Customer Login/customer_login.php"); // Redirect to login page if not logged in
    exit;
}

$username = $_SESSION['username']; // Retrieve the username from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VRS - Vehicle Rental System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2"> <!-- Placeholder for logo -->
            VRS
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="#">Home</a>
            <a class="nav-link" href="../Bookings/Booking.php">Booking</a>
            <a class="nav-link" href="#">Contact</a>
            <span class="nav-link"><?php echo htmlspecialchars($username); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center text-white">
            <h1>“ Drive Your Way, Anytime, Anywhere with VRS ! ”</h1>
            <p>Simply do a quick search to reserve your vehicle in no time. 1000+ vehicles to choose from according to your need!</p>
            
            <!-- Search Form -->
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <select class="form-control">
                        <option>Select Type</option>
                        <option>Car</option>
                        <option>Van</option>
                        <option>Bike</option>
                        <option>Tuk-Tuk</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control">
                        <option>Location</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" placeholder="Pickup Date">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" placeholder="End Date">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-warning btn-block">Quick Search</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehicle Cards -->
    <section class="vehicles py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="car_img.png" class="card-img-top" alt="Car">
                        <div class="card-body text-center">
                            <h5 class="card-title">Car</h5>
                            <p>Starting from <strong>Rs. 4000.00</strong></p>
                            <button class="btn btn-warning">Rent Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="van_img.png" class="card-img-top" alt="Van">
                        <div class="card-body text-center">
                            <h5 class="card-title">Van</h5>
                            <p>Starting from <strong>Rs. 9000.00</strong></p>
                            <button class="btn btn-warning">Rent Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="bike_img.png" class="card-img-top" alt="Bike">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bike</h5>
                            <p>Starting from <strong>Rs. 2500.00</strong></p>
                            <button class="btn btn-warning">Rent Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="tuk_img.png" class="card-img-top" alt="Tuk-Tuk">
                        <div class="card-body text-center">
                            <h5 class="card-title">Tuk-Tuk</h5>
                            <p>Starting from <strong>Rs. 3500.00</strong></p>
                            <button class="btn btn-warning">Rent Now</button>
                        </div>
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
