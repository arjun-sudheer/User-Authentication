<?php
// Include the database connection file
include 'db.php';

// Start a new session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the username exists
    $sql = "SELECT * FROM loginuser WHERE username='$username'";
    $result = $conn->query($sql);

    // Check if the username exists
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set the session variable and redirect to success page
            $_SESSION['username'] = $username;
            header("Location: success.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password!";
        }
    } else {
        // User not found
        echo "User not found!";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/stylelog.css">
</head>
<body>
    <!-- Login form container -->
    <div class="container">
        <!-- Login title -->
        <h2>Login</h2>

        <!-- Login form -->
        <form action="login.php" method="post">
            <!-- Username input -->
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <!-- Password input -->
            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <!-- Submit button -->
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
