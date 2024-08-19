<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    // Redirect to login page if not logged in as admin
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <main>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! You have admin privileges.</p>

        <!-- Optionally, add admin-specific content here -->

        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Michigan College Basketball League. All Rights Reserved.</p>
    </footer>
</body>
</html>
