<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
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

    .login-container {
        width: 300px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    .login-container input[type="text"]:hover,
    .login-container input[type="password"]:hover {
        border-color: #32CD32; /* Green */
    }

    .login-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #32CD32; /* Green */
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .login-container input[type="submit"]:hover {
        background-color: #228B22; /* Darker Green */
    }

    .register-link {
        text-align: center;
    }

    .register-link a {
        color: #007bff;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
         <div class="register-link">
        Don't have an account? <a href="register.php">Register</a>
    </div>

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
   
</div>
</body>
</html>
