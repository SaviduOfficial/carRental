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
            <h1>Welcome!</h1>
            <p>Already have an account? <a href="../Customer Registration/customer_registration.php">Sign up</a></p>
            <form method="POST" action="customer_login.php">
                
                <label for="username">Username:</label>
                <input type="text" id="username" class="form-control" placeholder="Username" required>
                
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Your Mobile Number" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password" required>

      

                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I have read and agree to the <a href="#">Terms of Service</a></label>

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