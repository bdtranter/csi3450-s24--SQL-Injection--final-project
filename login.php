<?php
session_start();

// Database connection
$servername = "localhost";
$db_username = "guest";
$db_password = "";
$dbname = "basketball_db";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a new connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query to fetch the user
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = $user['is_admin'];

            // Redirect to the admin page for admin users
            if ($_SESSION['is_admin']) {
                header("Location: adminindex.html");
                exit();
            } else {
                // Redirect to a different page or index.html for non-admin users
                header("Location: userindex.html");
                exit();
            }
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
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
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Login to Your Account</h2>
    </header>

    <main>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        <?php else: ?>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <!-- Register Button -->
            <form action="register.php" method="get">
                <button type="submit">Register</button>
            </form>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Michigan College Basketball League. All Rights Reserved.</p>
    </footer>
</body>
</html>
