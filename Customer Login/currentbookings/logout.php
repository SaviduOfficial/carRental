
<?php
session_start();
session_unset();
// Destroy the session
session_destroy();

// Redirect to the login page
// header("Location: ../Customer Login/customer_login.php");
echo "<script>
            alert('Logged out Succesfully');
            window.location.href = '../../Customer Login/customer_login.php';
            </script>";


exit;
?>
