<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Clear any cookies set for remember me functionality
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, '/'); // Expire cookie
}

// Redirect to login page
header("Location: login.php");
exit();
?>
