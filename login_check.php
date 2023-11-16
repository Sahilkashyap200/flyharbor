<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        // User found, store user info in session and redirect to homepage2.html
        $user_data = $result->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $user_data['id'];
        $_SESSION['user_email'] = $user_data['email'];
        // You can store other user-related data in the session as needed

        header("Location: bookingpage.php");
        exit;
    } else {
        // User not found, redirect back to login.html with invalid parameter
        header("Location: login.html?invalid=true");
        exit;
    }
}

// Close the database connection
$conn->close();
?>
