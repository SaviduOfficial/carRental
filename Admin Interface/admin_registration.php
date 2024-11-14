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

    // Validation of email
    if (!filter_var($ademail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email";  
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
    <link rel="stylesheet" href="styleadminreg.css">
</head>
<body>
    <div class="container">
        <div class="registration-form">
            <h1>Admin Registration Portal</h1>
            <form method="POST" action="">
                <div class="two-column">
                    <div>
                        <label for="firstName">First Name:</label>
                        <input type="text" id="adfirstName" name="adfirstName" placeholder="First Name" required>
                    </div>
                    <div>
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="adlastName" name="adlastName" placeholder="Last Name" required>
                    </div>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="adusername" name="adusername" placeholder="Username" required>
                    </div>
                    <div>
                        <label for="mobile">Mobile Number:</label>
                        <input type="tel" id="admobile" name="admobile" placeholder="Your Mobile Number" required>
                    </div>
                    <div>
                        <label for="email">Email Address:</label>
                        <input type="email" id="ademail" name="ademail" placeholder="Your Email Address" required>
                    </div>
                    <div>
                        <label for="address">Home Address:</label>
                        <input type="text" id="address" name="address" placeholder="Your Home Address" required>
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="adpassword" name="adpassword" placeholder="Your Password" required>
                    </div>
                    <div>
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="adconfirm-password" name="adconfirm-password" placeholder="Confirm Password" required>
                    </div>
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
