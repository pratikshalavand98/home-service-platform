<?php
// Database connection credentials
$servername = "localhost";  // Adjust this according to your server settings
$username = "root";  // MySQL default username
$password = "";  // MySQL default password, change if needed
$dbname = "hsp";  // The database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get form inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $location = $conn->real_escape_string($_POST['location']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare SQL query to insert data
    $sql = "INSERT INTO contact_us (name, email, phone, location, message) 
            VALUES ('$name', '$email', '$phone', '$location', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
