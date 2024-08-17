<?phpsession_start();

// Dummy credentials for demonstration (username: admin, password: admin123)$valid_username = 'admin';
$valid_password = 'admin123';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle Loginif (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === $valid_username && $password === $valid_password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
        } else {
            $error = "Invalid username or password.";
        }
    }
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
        <?phpif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <p>Welcome, <?phpechohtmlspecialchars($_SESSION['username']); ?>!</p>
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        <?phpelse: ?>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="login">Login</button>
            </form>

            <?phpif (isset($error)): ?>
                <p style="color: red;"><?phpecho$error; ?></p>
            <?phpendif; ?><?phpendif; ?>

            <!--Register Button-->
            <form action="register.php" method="get">
                <button type="submit">Register</button>
            </form>
        <?phpendif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Michigan College Basketball League. All Rights Reserved.</p>
    </footer>
</body>
</html>
