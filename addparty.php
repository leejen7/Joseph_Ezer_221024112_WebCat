<?php
// Include the connection file to connect to the database
require_once 'connectionfile.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve party name and starting year from the form
    $partyName = $_POST['party-name'];
    $startYear = $_POST['party-start-year'];

    // Construct the query to insert party information into the 'party' table
    $query = "INSERT INTO `party` (`partyid`, `partyname`, `partystartingyear`) VALUES (NULL, '$partyName', '$startYear')";

    // Perform the insertion
    if (mysqli_query($conn, $query)) {
        // Insertion successful, provide feedback
        echo "Party information successfully added.";
    } else {
        // Insertion failed, provide error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If form is not submitted, redirect back to the form page
    header("Location: adminpage.php");
    exit(); // It's a good practice to include an exit after a header redirect
}
?>
