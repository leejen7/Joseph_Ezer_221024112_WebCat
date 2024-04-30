<?php
// Include the connection file to connect to the database
require_once 'connectionfile.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Check if user exists
    if (mysqli_num_rows($result) == 1) {
        // User exists, fetch user data
        $user = mysqli_fetch_assoc($result);
        $role = $user['role'];

        // Redirect user based on role
        if ($role == 'admin') {
            header("Location: adminpage.php");
            exit(); // Stop further execution
        } elseif ($role == 'voter') {
            header("Location: voterpage.php");
            exit(); // Stop further execution
        } else {
            // Invalid role, redirect to index page with error message
            echo "<script>alert('Invalid role. Please contact the administrator.');</script>";
            header("Location: index.php");
            exit(); // Stop further execution
        }
    } else {
        // User not found, redirect to index page with error message
        echo "<script>alert('User not available. Please register to continue.');</script>";
        exit(); // Stop further execution
    }
} 
?>
