<?php
// Start the session
session_start();

// Destroy the session
session_unset();  // Remove all session variables
session_destroy();  // Destroy the session

// Redirect to login page
header("Location: user_login.php");
exit();
?>
