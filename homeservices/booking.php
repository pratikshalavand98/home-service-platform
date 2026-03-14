<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "./include/header.php";
include_once "./scripts/DB.php";

// Redirect if 'provider' parameter is not set
if (!isset($_GET['provider'])) {
    header('Location: index.php');
    exit();
}

// Fetch provider details
$provider = DB::query("SELECT * FROM providers WHERE id=?", [$_GET['provider']])->fetch(PDO::FETCH_OBJ);

// Redirect if no provider found
if ($provider === false) {
    header('Location: index.php');
    exit();
}

include_once "msg/booking.php";
?>
<style>
/* General Styles */
body, html {
    height: 100%;
    margin: 0;
    background-color: #f2f2f2;
}

.container {
    margin-top: 30px;
    max-width: 800px;
}

.card {
    background-color: #fff;
    border: 2px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

.form-control, .form-control-file {
    border-radius: 5px;
    box-shadow: none;
    border-color: #ccc;
    background-color: #fff;
    color: #000;
}

.form-control:focus, .form-control-file:focus {
    border-color: #001f3f;
    box-shadow: 0 0 0 0.2rem rgba(0, 31, 63, 0.1);
}

.form-group label {
    color: #000;
    padding: 5px;
    border-radius: 3px;
    display: block;
}

.btn-navy-blue {
    background-color: #001f3f;
    color: #fff;
}

.btn-navy-blue:hover {
    background-color: #003366;
}

.btn-secondary {
    background-color: #e0e0e0;
    color: #001f3f;
}

.btn-secondary:hover {
    background-color: #b0b0b0;
}

.back-link {
    font-size: 14px;
    color: #001f3f;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.back-link:hover {
    text-decoration: underline;
}

.back-link::before {
    content: '←';
    margin-right: 5px;
}

.table th, .table td {
    color: #000;
}

.table th {
    font-weight: bold;
}
</style>
<!-- Add Home link at the top left -->
<a href="http://localhost/hsP/mainpage.php" style="font-size: 18px; font-weight: bold; color: black; position: absolute; top: 10px; left: 10px; text-decoration: none;">Home</a>
<div class="container" style="margin-top: 30px;">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center" style="color: black;">Details about <?= htmlspecialchars($provider->name); ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <img style="height: 250px; border-radius: 10px;" src="images/<?= htmlspecialchars($provider->photo); ?>" alt="<?= htmlspecialchars($provider->name); ?>">
                </div>
            </div>
            <table class="table mt-3">
                <tr>
                    <th>Name</th>
                    <td><?= htmlspecialchars($provider->name); ?></td>
                    <th>Profession</th>
                    <td><?= htmlspecialchars($provider->profession); ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <?= htmlspecialchars($provider->adder1); ?>,
                        <?= htmlspecialchars($provider->adder2); ?>
                    </td>
                    <th>City</th>
                    <td><?= htmlspecialchars($provider->city); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="container" style="margin-bottom: 60px; margin-top: 20px;">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center" style="color: black;">Book Appointment with <?= htmlspecialchars($provider->name); ?></h3>
            </div>
            <hr>
            <form action="scripts/bookhall.php" method="post">
                <input type="hidden" name="provider" value="<?= htmlspecialchars($provider->id); ?>">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input id="fname" name="fname" type="text" class="form-control" placeholder="First Name" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input id="lname" name="lname" type="text" class="form-control" placeholder="Last Name" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input id="contact" name="contact" type="text" class="form-control" placeholder="Contact No."
                        minlength="10" maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                </div>

                <div class="form-group">
                    <label for="adder">Address</label>
                    <input id="adder" name="adder" type="text" class="form-control" placeholder="Address"
                        maxlength="255" required>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input class="form-control" type="date" name="date" id="date" required>
                </div>

                <div class="form-group">
                    <label for="payment">Payment Mode</label>
                    <select class="form-control" name="payment" id="payment" onchange="handlePaymentChange()" required>
                        <option value="cash">Cash</option>
                        <option value="gpay">Gpay</option>
                    </select>
                </div>
                <!-- Gpay QR Code Section (Visible if 'Gpay' selected) -->
                <div class="form-group qr-code-section" id="qrCodeSection" style="display: none;">
                    <label>Scan QR Code for Gpay Payment</label>
                    <img src="/HSP/services/payment/pay.jpg" alt="Gpay QR Code" class="img-fluid" style="max-width: 200px;">
                </div>

                <div class="form-group">
                    <label for="queries">Problem</label>
                    <textarea id="queries" name="queries" class="form-control" maxlength="255"
                        placeholder="Any queries..?"></textarea>
                </div>

                <button style="margin-top: 30px;" class="btn btn-navy-blue btn-block" type="submit" name="book" id="book">Book Appointment</button>
            </form>
        </div>
    </div>
</div>
<script>
function handlePaymentChange() {
    var payment = document.getElementById('payment').value;
    document.getElementById('qrCodeSection').style.display = (payment === 'gpay') ? 'block' : 'none';
}

</script>
