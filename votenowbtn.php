<?php
// Include the connection file to connect to the database
require_once 'connectionfile.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required parameters are present
    if (isset($_POST['candidateid']) && isset($_POST['partyname']) && isset($_POST['userid'])) {
        // Get the user ID from the session or wherever it's stored
        $userId = $_POST['userid'];

        // Check if the user has already voted within the past 24 hours
        $prevVoteQuery = "SELECT COUNT(*) AS vote_count FROM votes WHERE userid = ? AND TIMESTAMPDIFF(HOUR, vote_time, NOW()) < 24";
        $prevVoteStmt = $conn->prepare($prevVoteQuery);
        $prevVoteStmt->bind_param('i', $userId);
        $prevVoteStmt->execute();
        $prevVoteResult = $prevVoteStmt->get_result();
        $prevVoteRow = $prevVoteResult->fetch_assoc();

        if ($prevVoteRow['vote_count'] > 0) {
            // User has already voted within the past 24 hours, handle accordingly (e.g., display an error message)
            echo "You have already voted within the past 24 hours.";
        } else {
            // Insert the vote into the 'votes' table
            $insertQuery = "INSERT INTO votes (candidateid, partyname, userid, vote_time) VALUES (?, ?, ?, NOW())";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param('iss', $_POST['candidateid'], $_POST['partyname'], $_POST['userid']);

            if ($insertStmt->execute()) {
                // Vote successfully recorded, redirect user to results page
                header("Location: voterpage.php#results");
                exit();
            } else {
                // Error occurred while recording the vote, handle accordingly
                echo "Error occurred while recording the vote.";
            }
        }
    } else {
        // Missing parameters, handle accordingly (e.g., display an error message)
        echo "Missing parameters.";
    }
} else {
    // Request method is not POST, handle accordingly (e.g., redirect back to the voter page)
    header("Location: voterpage.php");
    exit();
}
?>
