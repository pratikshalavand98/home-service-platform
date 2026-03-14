<?php
include('./includes/add_register.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Home Services Platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="./uploads/cicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link href="src/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="./js/bootstrap.min.js"></script>

    <style type="text/css">
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f2f2f2;
        }

        .card {
            width: 80rem; /* Increased width from 60rem to 80rem */
            padding: 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #156699;
            color: #ffffff;
            font-weight: bold;
            font-size: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-control {
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-primary {
            width: 100%;
            background-color: #156699;
        }

        .btn-secondary {
            width: 100%;
        }

        .register-info {
            margin-top: 10px;
            text-align: right;
            font-size: 14px;
        }

        .register-info a {
            text-decoration: none;
        }

        /* Logo styling */
        .logo {
            display: block;
            margin: 0 auto 20px; /* Center the logo */
            width: 100px; /* Adjust the size as necessary */
        }
    </style>
</head>
<body>

<!-- Registration Form (Centered and with Border) -->
<div class="card mx-auto"><br><br><br><br><br><br>
    <div class="card-header">Registration For Customer</div>
    <div class="card-body">
<!-- Registration Heading -->
        <!-- Logo -->
        <img src="\HSP\images\services\thumbnails\avatar-9.png" alt="Logo" class="logo"> <!-- Adjust the path to your logo as necessary -->
       <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform">
            <div class="form-group">
                <label for="Profile">Profile</label>
                <input type="file" name="image" class="form-control" placeholder="Upload your Picture Profile">
            </div>
            <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Your Address" required>
            </div>
            <div class="form-group">
                <label for="contact">contact No.</label>
                <input type="text" name="contact" class="form-control" placeholder="Your Cell Phone No." required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">
                    <span class="fa fa-user"></span>&nbsp;Submit
                </button>
            </div>

            <!-- Registered Users Link (Positioned to the right) -->
            <div class="register-info">
                <span>If you are registered, <a href="http://localhost/hsP/forms/" title="Login">click here</a> to login</span>
            </div>
        </form>

        <!-- Back Button -->
        <a href="http://localhost/Hsp/mainpage.php">
            <button style="margin-top: 20px;" class="btn btn-secondary btn-block" onclick="history.back()">← Back</button>
        </a>
    </div>
</div>

</body>
</html>
