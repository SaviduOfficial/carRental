<?php
include '../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adusername = $_POST['adusername'];
    $adpassword = $_POST['adpassword'];

    // Prepare and execute a query to fetch user data
    $stmt = $conn->prepare("SELECT admin_id, adusername, adpassword FROM admins WHERE adusername = ?");
    $stmt->bind_param("s", $adusername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($adpassword, $row['adpassword'])) {
            $_SESSION['aduser_id'] = $row['admin_id']; // Set session variable
            $_SESSION['adusername'] = $row['adusername']; // Set session variable for username

            header("Location: ../Admin Interface/admin_home.php"); // Redirect to home page
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that username!";
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
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="registration-form">
            <h1>Admin Login Portal</h1>
           
			<br>
			<p>Not an Admin? <a href="../Customer Login/customer_login.php">Log In As a Customer</a></p>
            <form method="POST" action="">
                
                <label for="username">Username:</label>
                <input type="text" id="adusername" name="adusername" class="form-control" placeholder="Username" required>
                
                <!-- <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Your Mobile Number" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" required> -->
				<br>
                <label for="adpassword">Password</label>
                <input type="password" id="adpassword" name="adpassword" placeholder="Your Password" required>

				<br>
				<br>
                <button type="submit" class="btn">Sign In</button>
            </form>
			<!-- <button type="button" class="btn" id="admin_btn" onclick="window.location.href='../Admin Interface/admin_login.php'">Admin Login</button> -->

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