<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Simple validation
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, address, username, mobile, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstName, $lastName, $address, $username, $mobile, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: ../Customer Login/customer_login.php"); // Redirect to login page
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
            <h1>Welcome!</h1>
            <p>Already have an account? <a href="../Customer Login/customer_login.php">Log In</a></p>
            <form method="POST" action="">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Your Mobile Number" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password" required>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                
                <div>
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I have read and agree to the <a href="#">Terms of Service</a></label>
                </div>

                <button type="submit" class="btn">Sign Up</button>
            </form>
        </div>
        <div class="info-section">
            <div class="logo">
                <img src="../VRSLOGO.PNG" alt="Company Logo">
            </div>
            <h2>Looking for a Rental Vehicle?</h2>
            <p>Your journey starts here! Simply sign up to create your account and you'll be able to access and manage your bookings in no time.</p>
        </div>
    </div>
</body>
</html>
