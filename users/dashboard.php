<?php
// Start the session
session_start();

// Check if the user is login
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: user_login.php");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome to your Dashboard, <?php echo htmlspecialchars($username); ?>!</h2>
<!-- Logout option -->
<a href="logout.php">Logout</a>
</body>
</html>
