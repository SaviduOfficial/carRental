<?php
include "../config.php"; // Database connection

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $vehicleID = $_GET['vehicleID'] ?? '';
    $selection = $_GET['selection'] ?? '';

    if (!empty($vehicleID)) {
        // Fetch vehicle details based on selection
        $query = "SELECT * FROM registered_vehicles WHERE VehicleID = ? AND availability = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $vehicleID, $selection);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $vehicle = $result->fetch_assoc();
            
            if ($selection === 'yes') {              
?>
                <form action="updateVehicle.php" method="POST">
                    <h4>Vehicle ID: <?php echo $vehicle['VehicleID']; ?></h4>
                    <h4>Registration Number: <?php echo $vehicle['Regi_No_p1'] . " - " . $vehicle['Regi_No_p2']; ?></h4>
                    <?php $_SESSION['VehicleID'] = $vehicle['VehicleID']; ?>

                    <div>
                        <label for="availability">Availability of the vehicle:</label>

                        <input type="text" id="availability" name="availability" value="<?php echo $vehicle['availability']; ?>">
                    </div>

                    <?php $_SESSION['selection'] = $selection; ?>

                    <button type="submit">Update Availability</button>
                </form>
            <?php
               } elseif ($selection === 'no') {
                // Otherwise, display all vehicle details
            ?>
                <form action="updateVehicle.php" method="POST">
                    <h4>Vehicle ID: <?php echo $vehicle['VehicleID']; ?></h4>
                    <h4>Registration Number: <?php echo $vehicle['Regi_No_p1'] . " - " . $vehicle['Regi_No_p2']; ?> </h4>
                    
                    <?php $_SESSION['selection'] = $selection; ?>
                    <?php $_SESSION['VehicleID'] = $vehicle['VehicleID']; ?>
                    <div>
                        <label for="availability">Availability of the vehicle:</label>

                        <input type="text" id="availability" name="availability" value="<?php echo $vehicle['availability']; ?>">
                    </div>

                    <button type="submit">Update Availability</button>
                </form>


<?php
            } else {
                echo "Vehicle not found.";
            }
            $stmt->close();
        } else {
            echo "Please enter a valid Vehicle ID.";
        }
    }
}
$conn->close();
?>