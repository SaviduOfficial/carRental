<?php
// payment.php
session_start();
if (isset($_SESSION['BID'])) {
    $bookingID = $_SESSION['BID'];
} else {
    die("Booking ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Payment Gateway</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="process_payment.php">
                             
                            <input type="hidden" name="BID" value="<?php echo htmlspecialchars($bookingID); ?>">

                            <!-- Cardholder Name -->
                            <div class="mb-3">
                                <label for="cardholderName" class="form-label">Cardholder Name</label>
                                <input type="text" class="form-control" id="cardholderName" name="cardholderName" required>
                            </div>

                            <!-- Card Number -->
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                            </div>

                            <!-- Expiry Date -->
                            <div class="mb-3">
                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                <input type="month" class="form-control" id="expiryDate" name="expiryDate" required>
                            </div>

                            <!-- CVV -->
                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="password" class="form-control" id="cvv" name="cvv" maxlength="3" required>
                            </div>

                            <!-- Billing Address -->
                            <div class="mb-3">
                                <label for="billingAddress" class="form-label">Billing Address</label>
                                <textarea class="form-control" id="billingAddress" name="billingAddress" rows="3" placeholder="Enter your billing address" required></textarea>
                            </div>

                            <!-- Payment Amount -->
                            <div class="mb-3">
                                <label for="paymentAmount" class="form-label">Payment Amount</label>
                                <input type="text" class="form-control" id="paymentAmount" name="paymentAmount" value="Rs.10000.00" readonly>
                            </div>
                            <br>
                            
                            <!-- Pay now Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Pay Now</button>
                            </div>
                            
                            <hr/>
                            
                            
                            <!-- Pay later Button -->
                            <div class="d-grid">
                            <!-- <p class="text-secondary text-center ">If you wish you can pay and confirm the booking later.</p> -->
                                <!-- <button  class="btn btn-warning">Pay Later</button> -->
                                <button class="btn btn-warning" onclick="window.location.href = '../Home/home.php'">Pay Later</button>

                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                <p class="text-muted text-center mt-3">Your payment is secure with us.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

