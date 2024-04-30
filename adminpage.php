
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
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

    .content p {
        font-size: 18px;
        color: #555;
    }

    .content h2 {
        color: #333;
    }

    .category-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .category-list li {
        padding: 8px 0;
    }

    .category-list li a {
        color: #fff;
        text-decoration: none;
        display: block;
        transition: color 0.3s;
    }

    .category-list li a:hover {
        color: #32CD32; /* Green */
    }

    .welcome {
        color: #333;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
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

    .action-button {
        background-color: #f44336; /* Red */
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    .action-button:hover {
        background-color: #d32f2f; /* Darker Red */
    }

    .edit-button {
        background-color: #007bff; /* Blue */
    }

    .edit-button:hover {
        background-color: #0056b3; /* Darker Blue */
    }

    .form-container {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 10px;
    }

    .form-container input[type=text],
    .form-container input[type=date],
    .form-container input[type=email],
    .form-container select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-container input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    .form-container input[type=submit]:hover {
        background-color: #45a049;
    }

    .print-button {
        background-color: #008CBA; /* Blue */
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    .print-button:hover {
        background-color: #005f6b; /* Darker Blue */
    }
</style>
</head>
<body>

<div class="sidebar">
    <div class="welcome">Welcome <span style="font-weight: normal;">John DOE</span></div>
    <ul>
        <li>
            <a href="#">Home</a>
            <ul class="category-list">
                <li><a href="#" onclick="showSection('home')">Welcome as an admin of Online Voting System!</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Add</a>
            <ul class="category-list">
                <li><a href="#" onclick="showSection('add-political-parties')">Add Political Parties</a></li>
                <li><a href="#" onclick="showSection('add-candidate')">Add Candidate</a></li>
            </ul>
        </li>
        <li>
            <a href="#">List</a>
            <ul class="category-list">
                <li><a href="#" onclick="showSection('list-political-parties')">Political Parties List</a></li>
                <li><a href="#" onclick="showSection('list-candidate')">Candidate Lists</a></li>
                <li><a href="#" onclick="showSection('user-list')">User List</a></li> <!-- Added user list link -->
            </ul>
        </li>
        <li><a href="#" onclick="showSection('result')">Results</a></li>
    </ul>
</div>

<div class="content">
    <div id="home">
        <h2>Welcome as an admin of Online Voting System!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. </p>
    </div>

    <div id="add-political-parties" class="hidden">
        <h2>Add Political Parties</h2>
        <div class="form-container">
            <form action="addparty.php" method="post">
                <label for="party-name">Party Name:</label>
                <input type="text" id="party-name" name="party-name" placeholder="Enter party name...">
                
                <label for="party-start-year">Party Starting Year:</label>
                <select id="party-start-year" name="party-start-year">
                    <option value="2000">2000</option>
                    <option value="2001">1999</option>
                    <option value="2002">1998</option>
                    <option value="2000">1997</option>
                    <option value="2001">1996</option>
                    <option value="2002">1995</option>
                    <!-- Add more options as needed -->
                </select>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <!-- User List Section -->
    <div id="user-list" class="hidden">
        <h2>User List</h2>
        <?php
// Include the connection file to connect to the database
require_once 'connectionfile.php';

// Query to select user information from the 'users' table
$query = "SELECT userid, firstname, lastname, username, date_of_birth, gender, email, password, role FROM users";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output table headers
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Firstname</th>";
    echo "<th>Lastname</th>";
    echo "<th>Username</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Gender</th>";
    echo "<th>Email</th>";
    echo "<th>Password</th>";
    echo "<th>Role</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Output table rows with user data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['date_of_birth'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>";
        echo "<button class='action-button edit-button'>Update</button>";
        echo "<button class='action-button'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    // If no rows are returned, display a message
    echo "No users found.";
}
?>

    </div>
    <!-- End of User List Section -->

    <!-- Political Parties List Section -->
    <div id="list-political-parties" class="hidden">
        <h2>Political Parties List</h2>
        <?php
            // Include the connection file to connect to the database
            require_once 'connectionfile.php';

            // Query to select all data from the 'party' table
            $query = "SELECT * FROM party";
            $result = mysqli_query($conn, $query);

            // Check if there are any rows returned
            if (mysqli_num_rows($result) > 0) {
                // Output table headers
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Party Name</th>";
                echo "<th>Party Starting Year</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Output table rows with party data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['partyname'] . "</td>";
                    echo "<td>" . $row['partystartingyear'] . "</td>";
                    echo "<td>";
                    echo "<button class='action-button edit-button'>Edit</button>";
                    echo "<button class='action-button'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                // If no rows are returned, display a message
                echo "No political parties found.";
            }
            ?>

    </div>
    <!-- End of Political Parties List Section -->

    <!-- Add Candidate Section -->
    <div id="add-candidate" class="hidden">
        <h2>Add Candidate</h2>
        <div class="form-container">
            <form action="addcandidate.php" method="post">
                <label for="candidate-firstname">First Name:</label>
                <input type="text" id="candidate-firstname" name="candidate-firstname" placeholder="Enter first name...">
                
                <label for="candidate-lastname">Last Name:</label>
                <input type="text" id="candidate-lastname" name="candidate-lastname" placeholder="Enter last name...">
                
                <label for="candidate-username">Username:</label>
                <input type="text" id="candidate-username" name="candidate-username" placeholder="Enter username...">
                
                <label for="candidate-dob">Date of Birth:</label>
                <input type="date" id="candidate-dob" name="candidate-dob">
                
                <label for="candidate-email">Email:</label>
                <input type="email" id="candidate-email" name="candidate-email" placeholder="Enter email...">
                
                <label for="candidate-gender">Gender:</label>
                <select id="candidate-gender" name="candidate-gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="candidate-party">Party:</label>
                <select id="candidate-party" name="candidate-party">
                    <?php
                        // Include the connection file to connect to the database
                        require_once 'connectionfile.php';

                        // Query to select party names from the 'party' table
                        $query = "SELECT partyname FROM party";
                        $result = mysqli_query($conn, $query);

                        // Check if there are any rows returned
                        if (mysqli_num_rows($result) > 0) {
                            // Output options for select dropdown
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['partyname'] . "'>" . $row['partyname'] . "</option>";
                            }
                        } else {
                            // If no rows are returned, display a default option
                            echo "<option value='' disabled>No parties available</option>";
                        }
                    ?>

                </select>

                <label for="candidate-password">Password:</label>
                <input type="password" id="candidate-password" name="candidate-password" placeholder="Enter password...">
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <!-- End of Add Candidate Section -->

    <!-- Candidate List Section -->
    <div id="list-candidate" class="hidden">
        <h2>Candidate Lists</h2>
        <?php
// Include the connection file to connect to the database
require_once 'connectionfile.php';

// Query to select candidate information from the 'candidate' table
$query = "SELECT candidateid, firstname, lastname, username, date_of_birth, email, gender, password, partyid FROM candidate";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output table headers
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Firstname</th>";
    echo "<th>Lastname</th>";
    echo "<th>Username</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Gender</th>";
    echo "<th>Email</th>";
    echo "<th>Party</th>";
    echo "<th>Password</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Output table rows with candidate data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['date_of_birth'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";

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

        echo "<td>" . $row['password'] . "</td>";
        echo "<td>";
        echo "<button class='action-button edit-button'>Update</button>";
        echo "<button class='action-button'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    // If no rows are returned, display a message
    echo "No candidates found.";
}
?>

    </div>
    <!-- End of Candidate List Section -->

    <!-- Results Section -->
    <div id="result" class="hidden">
        <h2>Results</h2>
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Candidate Name</th>
                    <th>Votes Acquired</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>1000</td>
                </tr>
                <!-- Add more rows with candidate results -->
            </tbody>
        </table>
        <button class="print-button" onclick="window.print()">Print</button>
    </div>
    <!-- End of Results Section -->
</div>

<script>
    function showSection(sectionId) {
        var sections = document.getElementsByClassName('content')[0].children;
        for (var i = 0; i < sections.length; i++) {
            var section = sections[i];
            if (section.id === sectionId) {
                section.classList.remove('hidden');
            } else {
                section.classList.add('hidden');
            }
        }
    }
</script>

</body>
</html>
