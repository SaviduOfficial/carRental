<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['cusername'])) {
    header("Location: ../Customer Login/customer_login.php"); // Redirect to login page if not logged in
    exit;
}

$cusername = $_SESSION['cusername']; // Retrieve the username from the session

?>


<?php
include '../config.php'; // Include database connection

$vehicle_type = "";
$location = "";
$pickup_date = "";
$end_date = "";

// Process the form when it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_type = $_POST['vehicle_type'];
    $location = $_POST['location'];
    $pickup_date = $_POST['pickup_date'];
    $end_date = $_POST['end_date'];

    $sql = "SELECT * FROM vehicles WHERE vehicle_type LIKE ? AND location LIKE ? AND pickup_date >= ? AND end_date <= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $vehicle_type, $location, $pickup_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

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
        <a class="navbar-brand" href="#">
            <img src="VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2"> <!-- Placeholder for logo -->
            VRS
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="home.php">Home</a>
            <a class="nav-link" href="../Bookings/Booking.php">Booking</a>
            <a class="nav-link" href="#">Contact</a>
            <span class="nav-link"><?php echo htmlspecialchars($cusername); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center text-white">
            <h1>“ Drive Your Way, Anytime, Anywhere with VRS ! ”</h1>
            <p>Simply do a quick search to reserve your vehicle in no time. 1000+ vehicles to choose from according to your need!</p>
            
            <!-- Search Form -->
            <div class="row justify-content-center mt-4">
                <form method="POST" action="" class="form-inline">
                    <div class="form-group mx-2">
                        <select name="vehicle_type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="Car">Car</option>
                            <option value="Van">Van</option>
                            <option value="Bike">Bike</option>
                            <option value="Tuk-Tuk">Tuk-Tuk</option>
                        </select>
            </div>
        <div class="form-group mx-2">
            <select name="location" class="form-control">
                <option value="">Location</option>
                <!-- Add more options if needed -->
            </select>
        </div>
        <div class="form-group mx-2">
            <input type="date" name="pickup_date" class="form-control" placeholder="Pickup Date">
        </div>
        <div class="form-group mx-2">
            <input type="date" name="end_date" class="form-control" placeholder="End Date">
        </div>
        <div class="form-group mx-2">
            <button type="submit" class="btn btn-warning btn-block">Quick Search</button>
        </div>
    </form>
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
                            <a href="../VehicleBrowse/cars.php">
                                <button class="btn btn-warning">Rent Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="van_img.png" class="card-img-top" alt="Van">
                        <div class="card-body text-center">
                            <h5 class="card-title">Van</h5>
                            <p>Starting from <strong>Rs. 9000.00</strong></p>
                            <a href="../VehicleBrowse/Van.php">
                                <button class="btn btn-warning">Rent Now</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="bike_img.png" class="card-img-top" alt="Bike">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bike</h5>
                            <p>Starting from <strong>Rs. 2500.00</strong></p>
                            <a href="../VehicleBrowse/Bike.php">
                                <button class="btn btn-warning">Rent Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card vehicle-card">
                        <img src="tuk_img.png" class="card-img-top" alt="Tuk-Tuk">
                        <div class="card-body text-center">
                            <h5 class="card-title">Tuk-Tuk</h5>
                            <p>Starting from <strong>Rs. 3500.00</strong></p>
                            <a href="../VehicleBrowse/tuktuk.php">
                                <button class="btn btn-warning">Rent Now</button>
                            </a>
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
