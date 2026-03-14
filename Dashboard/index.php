<?php
// Start session to persist login status
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
      
      // If you are using plain-text passwords, use this (not recommended for security):
      if ($password == $user['password']) {
        // Password correct, show success message on the same page
        $message = "<div style='color: green;'>Login successful!</div>";
      } else {
        // Password incorrect, show error message
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
<title>HOME CLEAN | SERVICES</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel = "shortcut icon" href = "./uploads/cicon.png" />
<!-- //for-contact-apps -->
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
<link href="css/customize.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/src.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="./css/text.css">
<!--modal script-->
 <script src="./js/bootstrap.min.js"></script>
 <style type="text/css">
   *{
    scroll-behavior: smooth;
   }
   body, html {
     height: 100%;
     margin: 0;
     display: flex;
     justify-content: center;
     align-items: center;
     background-color: #f2f2f2;
   }

   .login-form-content {
     width: 400px;
     padding: 20px;
     background-color: #fff;
     border: 2px solid #ccc;
     border-radius: 10px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }

   .login-form-content h4 {
     text-align: center;
     margin-bottom: 20px;
   }

   .form-control {
     width: 100%;
     margin-bottom: 15px;
   }

   .btn-blue {
     width: 100%;
     background-color: #00008B; /* Blue color */
     color: #fff;
   }

   .btn-blue:hover {
     background-color: #0056b3; /* Darker blue on hover */
   }
 </style>
</head>
<body>

<!-- Login Form (Centered and with Border) -->
<div class="login-form-content">  
  <h4 class="modal-title">Login</h4>  
  <form method="post" action=""> <!-- Action remains empty to handle the form on the same page -->    
      <input type="email" name="email" class="form-control" placeholder="Input your email" required/>  
      <input type="password" name="password" class="form-control" placeholder="Please input your password" required/>
      <button name="login" class="btn btn-blue">
        Login
      </button>
      <hr/>
      <button type="button" class="btn btn-blue" onclick="window.location.href='register.php'">
        Register
      </button>
  </form>

  <!-- Display message here -->
  <?php if(!empty($message)) { echo $message; } ?>
</div>  

<!-- js -->
<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
<script src="./js/bootstrap-3.1.1.min.js"></script>
<script src='./js/bootstrapvalidator.min.js'></script>

</body>
</html>
