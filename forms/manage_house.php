<?php
session_start();
require_once 'logincheck.php';  // Ensure the user is logged in

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Establish database connection
$conn = new mysqli("localhost", "root", "", "hsp");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_POST['delete']) && isset($_POST['booking_id'])) {
    $booking_id = intval($_POST['booking_id']);
    
    // Prepare and execute delete query
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Booking deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete booking.']);
    }

    $stmt->close();
    $conn->close();
    exit(); // Stop further processing for AJAX response
}

// Fetch logged-in user's contact number from the users table
$user_contact_query = $conn->query("SELECT contact FROM users WHERE user_no = '$_SESSION[user_no]'");
$user_data = $user_contact_query->fetch_assoc();
$logged_in_user_contact = $user_data['contact'];

// Initialize the mobile number filter for bookings
$mobile_number = $logged_in_user_contact;

// Execute the query for bookings based on the logged-in user's contact number
$query_bookings = $conn->query("SELECT b.id, b.fname, b.lname, b.contact, b.adder, b.date, b.payment, b.queries, p.name AS provider_name 
                                FROM bookings b 
                                JOIN providers p ON b.provider_id = p.id 
                                WHERE b.contact = '$mobile_number' 
                                ORDER BY b.id DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Home Service Provider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <link rel="shortcut icon" href="./uploads/cicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/jquery.dataTables.min.css">
    <link href="./font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/style3.css">
    <link rel="stylesheet" type="text/css" href="./css/style6.css">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <script type="text/javascript" src="./js/jquery.dataTables.min.js"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #dd3d36;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #5cb85c;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
    <link rel="stylesheet" href="./css6/style.css">
</head>
<body>

    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="page-title">Manage Booking</h2>

                <!-- Display bookings for the logged-in user -->
                <div class="panel panel-default mt-3">
                    <div class="panel-heading">List of Bookings</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Provider Name</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Queries</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($query_bookings && $query_bookings->num_rows > 0): ?>
                                        <?php while ($booking = $query_bookings->fetch_assoc()): ?>
                                            <tr id="booking-<?php echo $booking['id']; ?>">
                                                <td><?php echo $booking['id']; ?></td>
                                                <td><?php echo htmlspecialchars($booking['provider_name']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['fname']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['lname']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['contact']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['adder']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['date']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['payment']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['queries']); ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" onclick="deleteBooking(<?php echo $booking['id']; ?>)" class="delete-booking"><i class="fa fa-trash" style="color:red"></i></a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="10">No bookings found for this mobile number.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

<script type="text/javascript" src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/dataTables.bootstrap.min.js"></script>
<script src="./js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function () {          
        setTimeout(function() {
            $('.succWrap').slideUp("slow");
        }, 3000);
    });

    function deleteBooking(id) {
        if (confirm("Are you sure you want to delete this booking?")) {
            $.ajax({
                type: "POST",
                url: location.href, // Specify the current page URL
                data: { delete: true, booking_id: id },
                success: function(response) {
                    const res = JSON.parse(response);
                    alert(res.message);
                    if (res.status === "success") {
                        $('#booking-' + id).remove(); // Remove the row from the table
                    }
                },
                error: function() {
                    alert("An error occurred while deleting the booking.");
                }
            });
        }
    }
</script> 

<script src="./js/main1.js"></script>
</html>
