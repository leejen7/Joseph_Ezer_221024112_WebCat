<?php
// Start session
session_start();

// Check if user is not logged in
if (!isset($_SESSION['userid'])) {
    // Redirect user to login page
    header("Location: index.php");
    exit(); // Ensure that script execution stops after redirection
}
?>
