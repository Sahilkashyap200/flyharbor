<?php
// Replace these credentials with your MySQL database credentials
$servername = "localhost";
    $username = "root";
    $password = "Ritika1707";
    $dbname = "airline";
// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the form data
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $subject = $_POST["subject"];

    // SQL query to insert form data into the database
    $sql = "INSERT INTO contact_us (full_name, email, country, subject) VALUES ('$fullName', '$email', '$country', '$subject')";

    if ($conn->query($sql) === true) {
        echo "Form data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
