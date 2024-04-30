
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voter Page</title>
<script src="votescript.js"></script>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 250px;
        background-color: #333;
        padding-top: 60px; /* Increased padding for space above menu */
        z-index: 1;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        padding: 10px 20px;
        border-bottom: 1px solid #555;
        position: relative;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        display: block; /* Make links full-width for block hover effect */
    }

    .sidebar ul li a:hover {
        background-color: #555; /* Block hover effect */
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }

    .hidden {
        display: none;
    }

    .welcome {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #222;
    }

    .menu-link {
        color: #fff;
        text-decoration: none;
    }

    .menu-link:hover {
        text-decoration: underline;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #333;
        color: white;
    }

    .vote-button {
        background-color: #4CAF50; /* Green */
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }

    .vote-button:hover {
        background-color: #45a049;
    }

    .see-results {
        display: block;
        margin-top: 10px;
        color: #007bff; /* Blue */
        text-decoration: none;
    }

    .see-results:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="sidebar">
    <div class="welcome">Welcome Voter</div>
    <ul>
        <li><a href="#" class="menu-link" onclick="showContent('vote-now')">Vote Now</a></li>
        <li><a href="#" class="menu-link" onclick="showContent('results')">Results</a></li>
        <li><a href="index.php" class="menu-link">Log Out</a></li>
    </ul>
</div>

<div class="content">
    <div id="vote-now" class="hidden">
        <h2>Vote Now</h2>
        <?php
// Include the connection file to connect to the database
require_once 'connectionfile.php';

// Query to select candidate information from the 'candidate' table
$query = "SELECT candidateid, firstname, lastname, date_of_birth, partyid FROM candidate";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output table headers
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Candidate Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Party</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Counter for candidate number
    $candidateNumber = 1;

    // Output table rows with candidate data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $candidateNumber++ . "</td>";
        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
        echo "<td>" . $row['date_of_birth'] . "</td>";

        // Query to get party name based on party id
        $partyId = $row['partyid'];
        $partyQuery = "SELECT partyname FROM party WHERE partyid = $partyId";
        $partyResult = mysqli_query($conn, $partyQuery);

        // Check if party name is found
        if (mysqli_num_rows($partyResult) > 0) {
            $partyRow = mysqli_fetch_assoc($partyResult);
            echo "<td>" . $partyRow['partyname'] . "</td>";
        } else {
            echo "<td>Unknown</td>";
        }

echo "<td><button class='vote-button'>Vote Now</button></td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    // If no rows are returned, display a message
    echo "No candidates found.";
}
?>

        <a href="#" class="see-results" onclick="showContent('results')">See the Results</a>
    </div>

    <div id="results" class="hidden">
        <h2>Results</h2>
        <table>
            <thead>
                <tr>
                    <th>Candidate Number</th>
                    <th>Name</th>
                    <th>Party</th>
                    <th>Votes Acquired</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Party A</td>
                    <td>1000</td>
                </tr>
                <!-- Add more rows with result data as needed -->
            </tbody>
        </table>
    </div>
</div>

<script>
    function showContent(contentId) {
        var contents = document.getElementsByClassName('content')[0].children;
        for (var i = 0; i < contents.length; i++) {
            var content = contents[i];
            if (content.id === contentId) {
                content.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
            }
        }
    }
</script>

</body>
</html>
