<?php
include "../config.php"; // Database connection

session_start();

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
                $_SESSION['selection'] = $selection;
            ?>
            <form action="updateVehicle.php" method="POST">
                    <h4>Vehicle ID: <?php echo $vehicle['VehicleID']; ?> (Read-Only)</h4>
                    <h4>Registration Number: <?php echo $vehicle['Regi_No_p1'] . " - " . $vehicle['Regi_No_p2']; ?> (Read-Only)</h4>
                    <?php $_SESSION['VehicleID'] = $vehicle['VehicleID']; ?>

                    <div>
                        <label for="Mileage">Mileage:</label>
                        <input type="text" id="Mileage" name="Mileage" value="<?php echo $vehicle['Milage']; ?>">
                    </div>

                    <button type="submit">Update Mileage</button>
                </form>
                <?php
            } elseif ($selection === 'all'){
                // Otherwise, display all vehicle details
                ?>
            <form action="updateVehicle.php" method="POST">
                <h4>Vehicle ID: <?php echo $vehicle['VehicleID']; ?></h4>
                <h4>Registration Number: <?php echo $vehicle['Regi_No_p1'] . " - " . $vehicle['Regi_No_p2']; ?> </h4>
                <br>
                <div>
                    <label for="Vehicle Owner">Owners first Name:</label>
                    <input type="text" id="Vehicle_make" name="fname" value="<?php echo $vehicle['First_Name']; ?>" >
                </div>
                <div>
                    <label for="Vehicle Owner">Owners Last Name:</label>
                    <input type="text" id="Vehicle_make" name="lname" value="<?php echo $vehicle['Last_Name']; ?>" >
                </div>
                <div>
                    <label for="Vehicle Owner">Owners email address:</label>
                    <input type="text" id="Vehicle_make" name="email" value="<?php echo $vehicle['Owners_email']; ?>" >
                </div>
                <div>
                    <label for="Vehicle Owner">Owners Contact Number:</label>
                    <input type="text" id="Vehicle_make" name="contact" value="<?php echo $vehicle['Owners_contact_number']; ?>">
                </div>

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
                    <input type="text" id="Mileage" name="Mileage" value="<?php echo $vehicle['Milage']; ?>" >
                </div>

                <div>
                    <label for="Color">Color:</label>
                    <input type="text" id="Color" name="colour" value="<?php echo $vehicle['colour']; ?>" readonly>
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
