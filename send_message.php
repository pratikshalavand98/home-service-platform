<?php
// Database connection details
$dsn = 'mysql:host=localhost;dbname=hsp';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Check if the user has sent a message
if (isset($_POST['username']) && isset($_POST['message'])) {
    // Get and sanitize the user input
    $username = htmlspecialchars($_POST['username']);
    $userMessage = htmlspecialchars($_POST['message']);

    // Insert the user's message into the database
    $query = "INSERT INTO messages (username, message) VALUES (:username, :message)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':message', $userMessage);
    $stmt->execute();

    // Convert user message to lowercase for keyword matching
    $userMessageLower = strtolower($userMessage);

    // Auto-reply messages for an online home service platform
    $autoReplyMessages = [
        "Hello! How can we assist you with our home services today?",
        "Need help booking a service? Just let us know what you’re looking for!",
        "Thank you for reaching out! We offer a variety of home services including cleaning, maintenance, and repair.",
        "If you’re interested in booking, please provide your preferred date and time.",
        "We also offer special packages! Would you like to hear about our current deals?",
        "Our team is here to help you! Feel free to ask about any specific service.",
        "You can book directly through our platform, or let us know if you need assistance with the booking process.",
        "If you need to reschedule or cancel a booking, please let us know or visit your account settings.",
        "For more details on pricing, please specify the service you’re interested in.",
        "Our customer support is available 24/7. How can we make your experience better?",
        "Are you looking for a cleaning, repair, or installation service today?"
    ];

    // Check for specific keywords in the user's message and set a corresponding auto-reply
    if (strpos($userMessageLower, 'cleaning') !== false) {
        $autoReply = "We offer a range of cleaning services for homes and offices. Would you like to book a cleaning service?";
    } elseif (strpos($userMessageLower, 'repair') !== false) {
        $autoReply = "Our skilled professionals are available for various repair services. Could you tell us more about the repair you need?";
    } elseif (strpos($userMessageLower, 'pricing') !== false || strpos($userMessageLower, 'cost') !== false) {
        $autoReply = "For detailed pricing information, please specify the service you're interested in, and we’ll provide the rates.";
    } elseif (strpos($userMessageLower, 'book') !== false) {
        $autoReply = "To book a service, please provide your preferred date, time, and the type of service you need.";
    } else {
        // Fallback to a random general response if no keywords matched
        $autoReply = $autoReplyMessages[array_rand($autoReplyMessages)];
    }

    // Insert the auto-reply into the database
    $systemUsername = "Support Bot";
    $query = "INSERT INTO messages (username, message) VALUES (:username, :message)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $systemUsername);
    $stmt->bindParam(':message', $autoReply);
    $stmt->execute();
}
?>
