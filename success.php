<?php
// Start a session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }

        h2 {
            color: #769ae9;
        }
        h3 {
            color: #769ae9;
        }

        p {
            margin-top: 20px;
            font-size: 1rem;
        }

        a {
            text-decoration: none;
            color: #769ae9;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
            border: 2px solid #769ae9;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #769ae9;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Display login success message and user information -->
    <h2>Login Success</h2>
    <h3>Welcome to Your Secure Space!</h3>

    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! You've successfully logged in.</p>
    <!-- Logout link -->
    <a href="login.php">Logout</a>
</body>
</html>
