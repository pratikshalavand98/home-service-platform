<?php
$conn = new mysqli('localhost', 'root', '', 'hsp');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
