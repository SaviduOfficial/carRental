<?php
session_start();
session_unset();
// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../Admin Interface/admin_login.php");
exit;
?>
