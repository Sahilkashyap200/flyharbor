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

        // Now, let's find the matching flights in the bookings table
        $booking_query = "SELECT * FROM bookings WHERE name = '$user_name' AND email = '$user_email' ORDER BY booking_id DESC LIMIT 1";

        $booking_result = $conn->query($booking_query);

        // Initialize an array to store the flight schedule data
        $flight_schedule_data = array();

        if ($booking_result->num_rows > 0) {
            while ($booking_row = $booking_result->fetch_assoc()) {
                // Get the departure and destination from the booking
                $departure = $booking_row['departure'];
                $destination = $booking_row['destination'];

                // Find matching flight schedule data based on departure and destination
                $schedule_query = "SELECT * FROM airline_schedule WHERE flying_from = '$departure' AND flying_to = '$destination'";
                $schedule_result = $conn->query($schedule_query);

                if ($schedule_result->num_rows > 0) {
                    while ($schedule_row = $schedule_result->fetch_assoc()) {
                        // Add the matching flight schedule data to the array
                        $flight_schedule_data[] = $schedule_row;
                    }
                }
            }
        }

        // Close the database connection
        $conn->close();

        // Return the flight schedule data as JSON
        echo json_encode($flight_schedule_data);
    }
}
?>
