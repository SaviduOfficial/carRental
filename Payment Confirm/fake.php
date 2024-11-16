<?php
//php code to establsig dc con
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fake Payment</title>
</head>
<body>
    <h2>Fake </h2>
    

    <button onclick="openPaymentWindow()">Pay Now</button>

<script>
    function openPaymentWindow() {
        // Open the fake payment window in a modal or popup
        window.location.href = "payment.php?BID=13"; // Pass the BookingID dynamically
    }
</script>

</body>
</html>