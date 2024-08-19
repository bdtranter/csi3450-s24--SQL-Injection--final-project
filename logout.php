<?php
session_start();

// Regenerate session ID to avoid session fixation attacks
session_regenerate_id(true);

// Destroy the session
session_unset();
session_destroy();

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Redirect to the login page
header("Location: login.php");
exit();
?>
