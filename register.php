<?php
// Start session
session_start();

// Database connection details
$servername = "localhost";
$username = "guest";
$password = "";
$dbname = "basketball_db";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Username already taken.";
    } else {
        // Hash the password
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Insert new user into the database
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user, $hashed_password);

        if ($stmt->execute()) {
            // Registration successful, redirect to login page
            header("Location: login.php");
            exit();
        } else {
            $error = "Registration failed. Please try again.";
        }
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
