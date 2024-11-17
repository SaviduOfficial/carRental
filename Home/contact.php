<?php
// Include database configuration
include "../config.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>VRS - Contact Us</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="contactstyle.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="VRSLOGO.png" alt="VRS Logo" width="40" class="mr-2">
            VRS
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="../Home/home.php">Home</a>
            <a class="nav-link" href="../Bookings/Booking.php">Booking</a>
            <a class="nav-link active" href="#">Contact</a>
            <span class="nav-link"><?php echo htmlspecialchars($_SESSION['username']); ?> | <a href="logout.php" class="text-danger">Log Out</a></span>
        </div>
    </nav>

    <!-- Contact Us Section -->
    <section class="hero">
        <div class="container text-center text-white">
            <!-- <br>
            <br> -->
            <!-- <h1>Contact Us</h1>
            <p>We'd love to hear from you! Reach out to us using the form below or through our contact information.</p> -->
        </div>
    </section>

    <section class="contact-us">
        <div class="container">
            <div class="row">
                <!-- Contact Information -->
                <div class="col-md-6">
                    <h3>Contact Information</h3>
                    <p><i class="bi bi-geo-alt-fill red-icon"></i> Address: 123 D R Wijewardana Mawatha, Colombo, Sri Lanka </p>
                    <p><i class="bi bi-telephone-fill"></i> Phone: +011-654-9870</p>
                    <p><i class="bi bi-envelope-fill"></i> Email: contact@vrs.com</p>
                    <p><i class="bi bi-clock-fill"></i> Hours: Mon-Sat, 9:00 AM - 5:00 PM</p>
                </div>

                <!-- Contact Form -->
                <div class="col-md-6">
                    <h3>Send Us a Message</h3>
                    <form action="process_contact.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Your Email Address" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <br><br>
</body>
</html>
