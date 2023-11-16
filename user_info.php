<?php
// Start the session (if not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Connect to the database (replace with your database credentials)
    $host = "localhost";
    $username = "root"; 
    $password = "Ritika1707"; 
    $dbName = "airline"; 

    $conn = new mysqli($host, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user information from the database based on the user_id
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $user_name = $user_data['name'];
        $user_email = $user_data['email'];
    }

    // Close the database connection
    $conn->close();
}
?>