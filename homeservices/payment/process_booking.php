<?php
$dsn = 'mysql:host=localhost;dbname=hsp';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $service_date = $_POST['service_date'];
    $provider_id = $_POST['provider_id'];
    $payment_method = $_POST['payment_method'];
    $queries = $_POST['queries'];

    $query = "INSERT INTO bookings (provider_id, fname, lname, contact, address, service_date, payment_method, queries)
              VALUES (:provider_id, :fname, :lname, :contact, :address, :service_date, :payment_method, :queries)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':provider_id', $provider_id);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':service_date', $service_date);
    $stmt->bindParam(':payment_method', $payment_method);
    $stmt->bindParam(':queries', $queries);
    $stmt->execute();

    $booking_id = $db->lastInsertId();

    // Simulate a payment message for online payments
    if ($payment_method == 'GPay' || $payment_method == 'PhonePe') {
        echo "Payment link sent to your phone number: $contact via $payment_method. Please complete your payment.";
        // Here you would integrate with an SMS gateway or payment API
    } else {
        echo "Cash payment selected. Please prepare to pay at the time of service.";
    }

    echo "<br>Your booking ID is: $booking_id";
} else {
    echo "Invalid request method.";
}
?>
