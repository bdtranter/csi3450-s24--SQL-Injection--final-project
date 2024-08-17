<?phpsession_start();
session_unset();
session_destroy();
header("Location: login.php"); // Redirect to login pageexit();
?>