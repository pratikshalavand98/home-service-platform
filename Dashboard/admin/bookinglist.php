<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check login functionality
// Include the database script
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
$query_bookings = $conn->query("SELECT b.id, b.fname, b.lname, b.contact, b.adder, b.date, b.payment, b.queries, p.name AS provider_name FROM bookings b JOIN providers p ON b.provider_id = p.id ORDER BY b.id DESC") or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME BASED SERVICES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="../uploads/cicon.png"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style3.css">
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style6.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php include('./includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('./includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Manage Booking</h2>
                        <?php if (isset($_GET['msg'])): ?>
                            <div class="succWrap" id="msgshow"><?php echo htmlentities($_GET['msg']); ?></div>
                        <?php endif; ?>
                        <div class="panel panel-default">
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
                </div>
            </div>
        </div>
    </body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function () {
      $('.succWrap').slideUp("slow");
    }, 3000);
  });

  function deleteBooking(id) {
      if (confirm("Are you sure you want to delete this booking?")) {
          $.ajax({
              type: "POST",
              url: "", // current page
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
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../js/main1.js"></script>

</html>
