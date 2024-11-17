<?php
// Connect to the database
include "../config.php";
session_start();

// Retrieve and sanitize inputs
$vehicleType = isset($_POST['vehicle_type']) ? trim($_POST['vehicle_type']) : '';
$location = isset($_POST['location']) ? trim($_POST['location']) : '';
$pickupDate = isset($_POST['pickup_date']) ? trim($_POST['pickup_date']) : '';
$returnDate = isset($_POST['return_date']) ? trim($_POST['return_date']) : '';

$queryConditions = [];
$params = [];

// Build the query dynamically based on inputs
if ($vehicleType !== '') {
    $queryConditions[] = "Vehicle_type = ?";
    $params[] = $vehicleType;
}
if ($location !== '') {
    $queryConditions[] = "location = ?";
    $params[] = $location;
}
// if ($pickupDate !== '' && $returnDate !== '') {
//     $queryConditions[] = "NOT (? > Return_Date OR ? < Booking_Date)";
//     $params[] = $pickupDate;
//     $params[] = $returnDate;
// }

// Combine conditions into the WHERE clause
$whereClause = !empty($queryConditions) ? "WHERE " . implode(" AND ", $queryConditions) : "";

// Prepare the SQL query
$query = "SELECT * FROM registered_vehicles $whereClause";
$stmt = $conn->prepare($query);

// Bind parameters dynamically
$stmt->bind_param(str_repeat('s', count($params)), ...$params);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="Designs_styles copy.css">

</head>
<body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../Home/home.php">
            <img src="VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2"> <!-- Placeholder for logo -->
            VRS
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="../Home/home.php">Home</a>
            <a class="nav-link" href="../Customer Login/currentbookings/currentBookings.php">Current Bookings</a>
            <a class="nav-link" href="../Home/contact.php">Contact</a>
            <span class="nav-link"><?php echo htmlspecialchars($_SESSION['username']); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
        </div>
    </nav>   
    </nav>


    
    <section class="hero">
        <div class="container text-center text-white">
            <!-- <h1>“ Drive Your Way, Anytime, Anywhere with VRS ! ”</h1> -->
            <h1> Your Search Results for : <?php echo $vehicleType; ?>s From <?php echo $location; ?> Area</h1>
            
            
        



    <!-- Search Form -->
    <div class="row justify-content-center mt-4">
        <form method="POST" action="searchResults.php" class="form-inline">
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
                    <option value="">Select Location</option>
                    <!-- Add Sri Lanka's districts -->
                    <?php
                    $districts = [
                        "Ampara", "Anuradhapura", "Badulla", "Batticaloa", "Colombo",
                        "Galle", "Gampaha", "Hambantota", "Jaffna", "Kalutara",
                        "Kandy", "Kegalle", "Kilinochchi", "Kurunegala", "Mannar",
                        "Matale", "Matara", "Monaragala", "Mullaitivu", "Nuwara Eliya",
                        "Polonnaruwa", "Puttalam", "Ratnapura", "Trincomalee", "Vavuniya"
                    ];
                    foreach ($districts as $district) {
                        echo "<option value=\"$district\">$district</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mx-2">
                <input type="date" name="pickup_date" class="form-control" required>
            </div>

            <div class="form-group mx-2">
                <input type="date" name="return_date" class="form-control" required>
            </div>

            <div class="form-group mx-2">
                <button type="submit" class="btn btn-warning btn">Quick Search</button>
            </div>
        </form>
    </div>

    </div>
    </section>





    <div class="container mt-5">
        <!-- <h1 class="text-center">Available Vehicles</h1> -->
        <div class="row">
            <?php
            // Display results as cards
            if ($result->num_rows > 0) {
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
                            <h6 class="text-muted">
                                <i class="bi bi-geo-alt-fill" style="color: red;"></i> <?php echo $locationLabel; ?>
                            </h6>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>No vehicles match your search criteria.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
