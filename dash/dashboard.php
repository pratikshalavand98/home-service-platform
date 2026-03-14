<?php
// Start session and include database connection
session_start();
include 'db_connection.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Handle service booking submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_service'])) {
    $service_type = $_POST['service_type'];
    $service_date = $_POST['service_date'];
    $service_time = $_POST['service_time'];

    // Validate inputs
    if (empty($service_type) || empty($service_date) || empty($service_time)) {
        $error = "Please fill all fields.";
    } else {
        // Insert booking into the database
        $booking_query = "INSERT INTO bookings (user_id, service_type, service_date, service_time) VALUES ('$user_id', '$service_type', '$service_date', '$service_time')";
        mysqli_query($conn, $booking_query);
        $success = "Service booked successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
    <div class="row">
        <!-- User Profile Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>User Profile</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                </div>
            </div>
        </div>

        <!-- Service Booking Form -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5>Book a Service</h5>
                </div>
                <div class="card-body">
                    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                    <?php if (isset($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>
                    <form method="post" id="bookingForm">
                        <div class="form-group">
                            <label for="service_type">Service Type:</label>
                            <select name="service_type" class="form-control" required>
                                <option value="">Select Service</option>
                                <option value="Cleaning">Cleaning</option>
                                <option value="Plumbing">Plumbing</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Gardening">Gardening</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_date">Date:</label>
                            <input type="date" name="service_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="service_time">Time:</label>
                            <input type="time" name="service_time" class="form-control" required>
                        </div>
                        <button type="submit" name="book_service" class="btn btn-primary">Book Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h5>Contact Us</h5>
                </div>
                <div class="card-body">
                    <form id="contactForm" onsubmit="return validateContactForm()">
                        <div class="form-group">
                            <label for="contact_name">Name:</label>
                            <input type="text" name="contact_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_email">Email:</label>
                            <input type="email" name="contact_email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_message">Message:</label>
                            <textarea name="contact_message" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/jquery-2.1.4.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script>
    function validateContactForm() {
        // Add custom validation logic if needed
        return true;
    }
</script>
</body>
</html>
