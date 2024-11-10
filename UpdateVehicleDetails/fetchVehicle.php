<?php
include "../config.php"; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $vehicleID = $_GET['vehicleID'] ?? '';
    $selection = $_GET['selection'] ?? '';

    if (!empty($vehicleID)) {
        // Fetch vehicle details based on selection
        $query = "SELECT * FROM registered_vehicles WHERE VehicleID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $vehicleID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $vehicle = $result->fetch_assoc();
             // If "mileage" is selected, display mileage input as editable
             if ($selection === 'mileage') {
            ?>
            <form action="updateVehicle.php" method="POST">
                    <h4>Vehicle ID: <?php echo $vehicle['VehicleID']; ?> (Read-Only)</h4>
                    <h4>Registration Number: <?php echo $vehicle['Registration_Number']; ?> (Read-Only)</h4>

                    <div>
                        <label for="Mileage">Mileage:</label>
                        <input type="text" id="Mileage" name="Mileage" value="<?php echo $vehicle['Mileage']; ?>">
                    </div>

                    <button type="submit">Update Mileage</button>
                </form>
                <?php
            } elseif ($selection === 'all'){
                // Otherwise, display all vehicle details
                ?>
            <form action="updateVehicle.php" method="POST">
                <h4>Vehicle ID: <?php echo $vehicle['VehicleID']; ?> (Read-Only)</h4>
                <h4>Registration Number: <?php echo $vehicle['Registration_Number']; ?> (Read-Only)</h4>

                <div>
                    <label for="Vehicle_make">Vehicle Make:</label>
                    <input type="text" id="Vehicle_make" name="Vehicle_make" value="<?php echo $vehicle['Vehicle_make']; ?>" readonly>
                </div>

                <div>
                    <label for="Vehicle_model">Vehicle Model:</label>
                    <input type="text" id="Vehicle_model" name="Vehicle_model" value="<?php echo $vehicle['Vehicle_model']; ?>" readonly>
                </div>

                <div>
                    <label for="Mileage">Mileage:</label>
                    <input type="text" id="Mileage" name="Mileage" value="<?php echo $vehicle['Mileage']; ?>" readonly>
                </div>

                <div>
                    <label for="Color">Color:</label>
                    <input type="text" id="Color" name="Color" value="<?php echo $vehicle['Color']; ?>">
                </div>

                <div>
                    <label for="Fuel_type">Fuel Type:</label>
                    <input type="text" id="Fuel_type" name="Fuel_type" value="<?php echo $vehicle['Fuel_type']; ?>" readonly>
                </div>

                <button type="submit">Update Vehicle</button>
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
