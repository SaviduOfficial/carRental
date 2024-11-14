<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adfirstName = $_POST['adfirstName'];
    $adlastName = $_POST['adlastName'];
    $address = $_POST['address'];
    $adusername = $_POST['adusername'];
    $admobile = $_POST['admobile'];
    $ademail = $_POST['ademail'];
    $adpassword = $_POST['adpassword'];
    $adconfirmPassword = $_POST['adconfirm-password'];

    // Simple validation
    if ($adpassword !== $adconfirmPassword) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password
    $adhashedPassword = password_hash($adpassword, PASSWORD_BCRYPT);

    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO admins (adfirst_name, adlast_name, adaddress, adusername, admobile, ademail, adpassword) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $adfirstName, $adlastName, $address, $adusername, $admobile, $ademail, $adhashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: admin_login.php"); // Redirect to login page
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="registration-form">
            <h1>Admin Registration Portal</h1>
            <br>
            <!-- <p>Already have an account? <a href="../Customer Login/customer_login.php">Log In</a></p> -->
            <form method="POST" action="">
                <label for="firstName">First Name:</label>
                <input type="text" id="adfirstName" name="adfirstName" class="form-control" placeholder="First Name" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="adlastName" name="adlastName" class="form-control" placeholder="Last Name" required>

                <!-- <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required> -->

                <label for="username">Username:</label>
                <input type="text" id="adusername" name="adusername" class="form-control" placeholder="Username" required>
                
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="admobile" name="admobile" placeholder="Your Mobile Number" required>

                <label for="email">Email Address</label>
                <input type="email" id="ademail" name="ademail" placeholder="Your Email Address" required>

                

                <label for="address">Home Address</label>
                <input type="text" id="address" name="address" placeholder="Your Home Address" required>


                <label for="password">Password</label>
                <input type="password" id="adpassword" name="adpassword" placeholder="Your Password" required>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="adconfirm-password" name="adconfirm-password" placeholder="Confirm Password" required>
                
                <!-- <div>
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I have read and agree to the <a href="#">Terms of Service</a></label>
                </div> -->

                <button type="submit" class="btn">Register</button>
            </form>
        </div>
        <!-- <div class="info-section">
            <div class="logo">
                <img src="../VRSLOGO.PNG" alt="Company Logo">
            </div>
            <h2>Looking for a Rental Vehicle?</h2>
            <p>Your journey starts here! Simply sign up to create your account and you'll be able to access and manage your bookings in no time.</p>
        </div> -->
    </div>
</body>
</html>
