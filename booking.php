<?php
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

// Retrieve data from the form
$departureInput = $_POST['departureInput'];
$destinationInput = $_POST['destinationInput'];
$departureDate = $_POST['departureDate'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$travel_class = $_POST['travel_class'];
$email = $_POST['email'];

// Check if the email exists in the user table
$query = "SELECT name FROM users WHERE email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Email found in the user table, fetch the user's name
    $row = $result->fetch_assoc();
    $Name = $row['name'];

    // Insert the data into the bookings table with the user's name
    $query = "INSERT INTO bookings (departure, destination, departure_date, adults, children, travel_class, email, name)
              VALUES ('$departureInput', '$destinationInput', '$departureDate', '$adults', '$children', '$travel_class', '$email', '$Name')";

    if ($conn->query($query) === TRUE) {
        // Redirect to flight_schedule.html
        header("Location: flight_schedule.html");
        exit; // Make sure to exit to prevent further script execution
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "Error: Email not found in the user table.";
}

// Close the database connection
$conn->close();
?>
