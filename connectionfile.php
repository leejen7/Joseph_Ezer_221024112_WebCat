<?php
// Database connection parameters
$servername = "localhost"; // Assuming the database is hosted on the same server
$username = "ezer"; // MySQL username
$password = "webcat"; // MySQL password
$database = "webcat"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connected successfully";
}

// Close connection (optional, usually handled automatically)
//$conn->close();
?>
