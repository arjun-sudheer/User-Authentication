<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Main registration form container -->
    <div class="form">
        <!-- Registration title -->
        <h2 class="title">Register</h2>

        <!-- Registration form -->
        <form action="index.php" method="post">
            <!-- Username input -->
            <label for="username" class="label">Username</label>
            <input type="text" id="username" name="username" required="" class="input">

            <!-- Email input -->
            <label for="email" class="label">Email</label>
            <input type="email" id="email" name="email" required="" class="input">

            <!-- Password input -->
            <label for="password" class="label">Password</label>
            <input type="password" id="password" name="password" required="" class="input">

            <!-- Registration submit button -->
            <button type="submit" class="submit">Register</button>
        </form>

        <!-- Link to login page -->
        <p class="link">Already have an account? <a href="login.php">Login here</a>.</p>

        <?php
// Include the database connection file
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $fullName = $_POST['full_name'];

    // SQL query to insert user data into the database
    $sql = "INSERT INTO loginuser (username, password, email, full_name) 
            VALUES ('$username', '$password', '$email', '$fullName')";

    // Check if the query is successful
    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Registration successful!</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>



    </div>
</body>
</html>
