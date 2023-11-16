<?php
// Start the session (if not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroy the session to log the user out
session_destroy();

// Redirect the user to the login page or home page
header("Location: login.html"); // Change to your desired page
exit();
?>
