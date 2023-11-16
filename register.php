<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "Ritika1707";
    $dbname = "airline";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];

        // Check if the email is already in use
        $check_email_sql = "SELECT * FROM users WHERE email=?";
        $check_stmt = $conn->prepare($check_email_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo '<script>alert("Email is already in use. Please choose a different email."); window.location.href = "register.html";</script>';
        } else {
            // Email is not in use, proceed with registration
            $insert_sql = "INSERT INTO users (name, phone, email, gender, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("sssss", $name, $phone, $email, $gender, $password);

            if ($stmt->execute()) {
                header("Location: login.html");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
        
        $check_stmt->close();
    }

    $conn->close();
}
?>
