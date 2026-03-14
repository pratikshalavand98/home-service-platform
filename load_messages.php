<?php
$dsn = 'mysql:host=localhost;dbname=hsp';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Retrieve all messages from the database
$query = "SELECT * FROM messages ORDER BY timestamp ASC";
$stmt = $db->prepare($query);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='message'><span class='username'>{$row['username']}</span>: ";
    echo "{$row['message']} <span class='timestamp'>[{$row['timestamp']}]</span></div>";
}
?>
