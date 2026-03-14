<?php
// forgot_password.php
require 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Generate a unique and secure token
        $token = bin2hex(random_bytes(32));
        $hashedToken = password_hash($token, PASSWORD_DEFAULT); // Secure hash
        
        // Insert the hashed token into the password_resets table
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashedToken);
        $stmt->execute();

        // Create the reset URL (token is not hashed in URL)
        $resetUrl = "http://yourwebsite.com/reset_password.php?token=$token&email=" . urlencode($email);

        // Send password reset email
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: <a href='$resetUrl'>$resetUrl</a>";
        $headers = "From: no-reply@yourwebsite.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        if (mail($email, $subject, $message, $headers)) {
            echo "<div style='color: green;'>If your email exists in our system, a password reset link has been sent.</div>";
        } else {
            echo "<div style='color: red;'>Failed to send the email. Please try again later.</div>";
        }
    } else {
        echo "<div style='color: green;'>If your email exists in our system, a password reset link has been sent.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container" style="max-width: 400px; margin-top: 100px;">
        <h3 class="text-center">Forgot Password</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Enter your email address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
