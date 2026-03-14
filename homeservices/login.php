<?php
include_once "./include/header.php";
include_once "./msg/login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login for Service Providers</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Update path -->
    <link rel="stylesheet" href="path/to/your/style.css"> <!-- Update path -->
    <style>
        body {
            background-color: #f2f2f2; /* Gray background for the entire page */
        }

        .container {
            margin-top: 50px;
            width: 450px;
        }

        .card {
            background-color: #fff; /* White background for the card */
            color: #000; /* Black text color */
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-navy-blue {
            background-color: #0000A0; /* Navy blue */
            color: #fff; /* White text */
        }

        .btn-navy-blue:hover {
            background-color: #003366; /* Slightly darker navy blue on hover */
        }

        .form-control {
            background-color: #fff; /* White background for form inputs */
            color: #000; /* Black text color for form inputs */
        }

        .form-group label {
            color: #000; /* Black text color for labels */
        }

        .card-title {
            color: #000; /* Black text color for card title */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <img src="\homeservices\images\providers.jpeg" style="height: 150px; width: 150px; margin-left: 130px" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center">Login for Service Providers</h3>
            </div>
            <hr>

            <form action="scripts/login.php" method="post">
                <div class="form-group">
                    <label for="">Contact No.</label>
                    <input id="contact"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        name="contact" type="text" class="form-control" placeholder="Enter Contact No..."
                        minlength="10" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input id="password" name="password" type="password" class="form-control"
                        placeholder="Enter Password.." minlength="4" required>
                </div>

                <button style="margin-top: 30px;" class="btn btn-block btn-navy-blue" type="submit" name="login" id="login">Login</button>
                
                <div class="form-group row mb-0">
                    <div class="col-md-10">
                        <span style="font-size: 14px;">
    If you are not registered then 
    <a href="http://localhost/hsP/homeservices/register.php" title="Register" style="color: blue; text-decoration: underline;">
        click here
    </a> 
    for Registration
</span>

                    </div>
                </div>
            </form>

         <!-- Back Link -->
<a href="http://localhost/Hsp/mainpage.php" style="margin-top: 20px; color: #007bff; text-decoration: none; font-size: 16px;">
    ← Back
</a>

</a>



        </div>
    </div>
</div>

<!-- Include your JavaScript files -->
<script src="path/to/your/jquery.js"></script> <!-- Update path -->
<script src="path/to/your/bootstrap.js"></script> <!-- Update path -->

</body>
</html>
