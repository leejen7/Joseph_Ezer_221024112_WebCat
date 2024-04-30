<?php
// Include the connection file to connect to the database
require_once 'connectionfile.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['candidate-firstname'];
    $lastName = $_POST['candidate-lastname'];
    $username = $_POST['candidate-username'];
    $dob = $_POST['candidate-dob'];
    $email = $_POST['candidate-email'];
    $gender = $_POST['candidate-gender'];
    $partyName = $_POST['candidate-party'];
    $password = $_POST['candidate-password'];

    // Query to get party id based on party name
    $partyQuery = "SELECT partyid FROM party WHERE partyname = '$partyName'";
    $partyResult = mysqli_query($conn, $partyQuery);

    if (mysqli_num_rows($partyResult) == 1) {
        $partyRow = mysqli_fetch_assoc($partyResult);
        $partyId = $partyRow['partyid'];

        // Construct the query to insert candidate information into the 'candidate' table
        $insertQuery = "INSERT INTO candidate (firstname, lastname, username, date_of_birth, email, gender, password, partyid) 
                        VALUES ('$firstName', '$lastName', '$username', '$dob', '$email', '$gender', '$password', '$partyId')";

        // Perform the insertion
        if (mysqli_query($conn, $insertQuery)) {
            // Insertion successful, provide feedback or redirect to another page
            echo "Candidate information successfully added.";
        } else {
            // Insertion failed, provide error message
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Party not found, provide error message
        echo "Error: Party not found.";
    }
}
?>
