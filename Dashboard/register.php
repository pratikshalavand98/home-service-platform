<?php
include('./includes/add_register.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>HOME CLEAN | SERVICES</title>
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
     width: 60rem;
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

</style>
</head>
<body>

<!-- Registration Form (Centered and with Border) -->
<div class="card mx-auto">
    <div class="card-header">Register</div>
    <div class="card-body">
        <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform">
            <div class="form-group">
                <label for="Profile">Profile</label>
                <input type="file" name="image" class="form-control" placeholder="Upload your Picture Profile">
            </div>
            <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Fullname">
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Your Address">
            </div>
            <div class="form-group">
                <label for="contact">contact No.</label>
                <input type="text" name="contact" class="form-control" placeholder="Your Cell Phone No.">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">
                    <span class="fa fa-user"></span>&nbsp;Register
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
