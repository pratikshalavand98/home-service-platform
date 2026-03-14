<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Booking Form</title>
</head>
<body>
    <h2>Service Booking Form</h2>
    <form action="process_booking.php" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" required><br><br>

        <label for="contact">Contact Number:</label>
        <input type="text" name="contact" required><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br><br>

        <label for="service_date">Service Date:</label>
        <input type="date" name="service_date" required><br><br>

        <label for="provider_id">Select Service Provider:</label>
        <select name="provider_id" required>
            <!-- Replace with dynamic PHP provider data later -->
            <option value="1">Provider 1</option>
            <option value="2">Provider 2</option>
        </select><br><br>

        <label for="queries">Additional Queries:</label>
        <input type="text" name="queries"><br><br>

        <label for="payment_method">Payment Method:</label><br>
        <input type="radio" name="payment_method" value="GPay" required> Google Pay (GPay)<br>
        <input type="radio" name="payment_method" value="PhonePe"> PhonePe<br>
        <input type="radio" name="payment_method" value="Cash"> Cash<br><br>

        <button type="submit">Submit Booking</button>
    </form>
</body>
</html>
