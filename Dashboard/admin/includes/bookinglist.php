<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check login functionality
require_once __DIR__ . '/../../homeservices/scripts/checklogin.php';

// Include the database script
require_once __DIR__ . '/../../homeservices/scripts/DB.php';

// Establish connection
$conn = new mysqli("localhost", "root", "", "hsp");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete action with AJAX
if (isset($_POST['delete']) && isset($_POST['booking_id'])) {
    $booking_id = intval($_POST['booking_id']);

    // Check if the booking exists before deleting
    $check_sql = "SELECT * FROM bookings WHERE id=?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('i', $booking_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Proceed to delete
        $sql = "DELETE FROM bookings WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $booking_id);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Booking deleted successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete booking: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Booking not found."]);
    }

    $check_stmt->close();
    exit();
}

// Fetch bookings data
$query_bookings = $conn->query("SELECT b.id, b.fname, b.lname, b.contact, b.adder, b.date, b.payment, b.queries, p.name AS provider_name FROM bookings b JOIN providers p ON b.provider = p.id ORDER BY b.id DESC") or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
    <?php include('./includes/header.php'); ?>
    <div class="container">
        <h2 class="page-title">Manage Bookings</h2>
        <div class="panel panel-default">
            <div class="panel-heading">List of Bookings</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="bookingTable" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
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
                            <?php while ($booking = mysqli_fetch_array($query_bookings)) { ?>
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
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteBooking(id) {
            if (confirm("Do you want to delete this booking?")) {
                $.ajax({
                    url: 'bookinglist.php',
                    type: 'POST',
                    data: { delete: true, booking_id: id },
                    success: function(response) {
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            $('#booking-' + id).remove();
                            alert(result.message);
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function() {
                        alert('Failed to delete booking.');
                    }
                });
            }
        }
    </script>
</body>
</html>
