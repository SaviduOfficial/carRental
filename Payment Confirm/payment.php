<?php
// payment.php

if (isset($_GET['BID'])) {
    $bookingID = $_GET['BID'];
} else {
    die("Booking ID not provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fake Payment</title>
</head>
<body>
    <h2>Fake Payment Window</h2>
    <form method="POST" action="process_payment.php">
        <input type="hidden" name="BID" value="<?php echo htmlspecialchars($bookingID); ?>">
        <label for="cardNumber">Card Number:</label><br>
        <input type="text" id="cardNumber" name="cardNumber" required><br><br>
        <label for="expiryDate">Expiry Date:</label><br>
        <input type="text" id="expiryDate" name="expiryDate" required><br><br>
        <label for="cvv">CVV:</label><br>
        <input type="text" id="cvv" name="cvv" required><br><br>
        <button type="submit">Pay</button>
        
    </form>
</body>
</html>
