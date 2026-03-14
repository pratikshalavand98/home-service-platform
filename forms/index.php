<?php
// Start session to manage user login status
session_start();

// Database connection (update with your DB credentials)
$conn = new mysqli('localhost', 'root', '', 'hsp');

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message variable
$message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to fetch user by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if password is correct (use hashed password comparison if applicable)
            if ($password == $user['password']) {
                // Password correct, set session
                $_SESSION['logged_in'] = true;
                $_SESSION['user_email'] = $email;

                // Success message
                $message = "<script>alert('Login successful! Redirecting to the main page...');</script>";
                echo "<script>setTimeout(function() { window.location.href = 'http://localhost/Hsp/mainpage.php'; }, 2000);</script>";
            } else {
                // Password incorrect
                $message = "<div style='color: red;'>Incorrect password!</div>";
            }
        } else {
            // User not found
            $message = "<div style='color: red;'>No user found with that email!</div>";
        }

        $stmt->close();
    } else {
        $message = "<div style='color: red;'>Error preparing statement: " . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Home Service Provider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="./uploads/.png" />
    <link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/style1.css">
    <link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link href="css/customize.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/src.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="./css/text.css">
    <script src="./js/bootstrap.min.js"></script>
  
</head>
<body>

<!-- Login Form (Centered and with Border) -->
<div class="login-form-content">  

    <!-- Add the logo here -->
    <img src="\HSP\images\services\thumbnails\avatar-9.png" alt="Logo" class="logo"> <!-- Replace path_to_logo with the correct path -->

    <h4 class="modal-title">Login</h4>  
 <form method="post" action="login.php" enctype="multipart/form-data">    
        <input type="email" name="email" class="form-control" placeholder="Input your email" required/>  
        <input type="password" name="password" class="form-control" placeholder="Please input your password" required/>

               <button name="login" class="btn btn-blue">Login</button>
        <hr/>
        <!-- Registered Users Link (Positioned to the right) -->
        <div class="register-info">
            <span>If you are not registered, <a href="http://localhost/hsP/forms/register.php" title="registered">click here</a> For registered</span>
        </div>
    </form>
    
    <!-- Back Button -->
    <a href="http://localhost/Hsp/mainpage.php">
        <button style="margin-top: 20px;" class="btn btn-secondary btn-block" onclick="history.back()">← Back</button>
    </a>

    <!-- Display message here -->
    <?php if (!empty($message)) { echo $message; } ?>
</div>  

<!-- js -->
<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
<script src="./js/bootstrap-3.1.1.min.js"></script>
<script src='./js/bootstrapvalidator.min.js'></script>

</body>
</html>
