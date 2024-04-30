<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #ff9;
    }

    .register-container {
        width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .register-container h2 {
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .register-container input[type="text"],
    .register-container input[type="password"],
    .register-container input[type="email"],
    .register-container select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    .register-container input[type="text"]:hover,
    .register-container input[type="password"]:hover,
    .register-container input[type="email"]:hover,
    .register-container select:hover {
        border-color: #32CD32; /* Green */
    }

    .register-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #32CD32; /* Green */
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .register-container input[type="submit"]:hover {
        background-color: #228B22; /* Darker Green */
    }

    .register-container .gender-select {
        width: calc(100% - 22px);
    }

    .register-container .role-select {
        width: calc(100% - 22px);
    }

</style>
</head>
<body>

<div class="register-container">
    <h2>Register</h2>
    <form action="#" method="post">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="date" name="dob" placeholder="Date of Birth" required>
        <select name="gender" class="gender-select" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" class="role-select" required>
            <option value="" disabled selected>Select Role</option>
            <option value="voter">Voter</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" value="Register">
    </form>
</div>

<?php
// Include the connection file
require_once 'connectionfile.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if all fields are filled
    if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($dob) && !empty($gender) && !empty($email) && !empty($password) && !empty($role)) {
        // Construct the SQL query
        $sql = "INSERT INTO users (firstname, lastname, username, date_of_birth, gender, email, password, role) 
                VALUES ('$firstname', '$lastname', '$username', '$dob', '$gender', '$email', '$password', '$role')";
        
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registered Successfully');</script>";
            header("location:index.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
    // Close the connection after executing all queries
    mysqli_close($conn);
}
?>




</body>
</html>
