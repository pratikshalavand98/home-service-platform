<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Make Payment</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    .container {
      max-width: 600px;
      margin: auto;
    }
    .payment-code {
      text-align: center;
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center">Make Payment</h2>
    <div class="payment-code">
      <p>Scan this code to make the payment:</p>
      <img src="\project\img1\gpay.jpg" alt="Payment QR Code" width="70%">
    </div>
  </div>
  <script>
    setTimeout(function() {
      alert('Thank You For Order!');
      window.location.href = 'http://localhost/project/main%20page.html';
    }, 9000);
  </script>
</body>
</html>
