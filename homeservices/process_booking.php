<?php
include_once "./scripts/DB.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $provider_id = $_POST['provider'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $adder = $_POST['adder'];
    $date = $_POST['date'];
    $payment_method = $_POST['payment'];
    $queries = $_POST['queries'];

    // Insert booking into the database
    $sql = "INSERT INTO bookings (provider_id, fname, lname, contact, adder, date, payment, queries)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = DB::prepare($sql);
    $stmt->execute([$provider_id, $fname, $lname, $contact, $adder, $date, $payment_method, $queries]);

    $booking_id = DB::lastInsertId();

    // Display message and simulate payment notification
    if ($payment_method === 'GPay' || $payment_method === 'PhonePe') {
        echo "<h3>Payment link sent to $contact via $payment_method. Please complete your payment.</h3>";
        // Simulate an SMS or email payment link for real applications
        sendPaymentNotification($contact, $payment_method);
    } else {
        echo "<h3>Your booking with cash payment has been successfully recorded.</h3>";
    }

    echo "<p>Your booking ID is: $booking_id</p>";
} else {
    header("Location: booking.php");
    exit();
}

function sendPaymentNotification($contact, $method) {
    // Simulate sending a payment link to the user's phone number
    // In a real application, this would use an SMS or payment API
    echo "<p>Simulated payment notification sent to $contact via $method.</p>";
}
?>
