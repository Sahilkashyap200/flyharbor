<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Start the session
session_start();

// Database connection credentials
$host = "localhost";
$username = "root"; 
$password = "Ritika1707"; 
$dbName = "airline"; 

// Establish database connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute the query to check user credentials
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    // Check if the user was found
    if ($result->num_rows > 0) {
        // User found, redirect to booking.html
        header("Location: booking.html");
        exit;
    } else {
        // User not found, set the session variable for login failure
        $_SESSION['login_failed'] = true;
        header("Location: login.html");
        exit;
    }
}

// Close the database connection
$conn->close();
?>
