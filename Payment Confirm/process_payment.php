<?php
// process_payment.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve BookingID
    if (isset($_POST['BID'])) {
        $bookingID = $_POST['BID'];
    } else {
        die("Booking ID not provided.");
    }

    // Simulate payment processing
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    // Validate the card details (Optional for fake payment)
    if (empty($cardNumber) || empty($expiryDate) || empty($cvv)) {
        die("Invalid card details.");
    }

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vrs_database";
    

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute query to mark booking as paid
    $query = "UPDATE bookings SET paid_unpaid = 'paid' WHERE BID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bookingID);

    if ($stmt->execute()) {
        echo "Payment successful! Booking marked as paid.";
        
    } else {
        echo "Payment failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
