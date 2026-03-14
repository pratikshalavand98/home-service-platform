<?php 
require_once 'logincheck.php';

$conn = new mysqli("localhost", "root", "", "hsp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>HOME Service Provider</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="shortcut icon" href="../uploads/cicon.png" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style3.css">
  <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Federo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="../css/style6.css">
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #dd3d36;
      color: #fff;
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #5cb85c;
      color: #fff;
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
  </style>
</head>
<body>

  <?php include('./includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('./includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <center><h2 class="page-title">Dashboard</h2></center>

      <div class="col-md-12 col-md-offset-2 post-div mx-auto">
        <div class="row">
          <!-- Total Users Panel -->
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-body bk-primary text-light">
                <div class="stat-panel text-center">
                  <?php 
                  $qusers = $conn->query("SELECT COUNT(user_no) AS total FROM `users`") or die($conn->error);
                  $fusers = $qusers->fetch_array();
                  ?>
                  <div class="stat-panel-number h1"><?php echo $fusers['total']; ?></div>
                  <div class="stat-panel-title text-uppercase">Total Users</div>
                </div>
              </div>
              <a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>

          <!-- Manage Providers Panel -->
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-body bk-success text-light">
                <div class="stat-panel text-center">
                  <?php 
                  $qproviders = $conn->query("SELECT COUNT(id) AS total FROM `providers`") or die($conn->error);
                  $fproviders = $qproviders->fetch_array();
                  ?>
                  <div class="stat-panel-number h1"><?php echo $fproviders['total']; ?></div>
                  <div class="stat-panel-title text-uppercase">Manage Providers</div>
                </div>
              </div>
              <a href="managehall.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>

          <!-- Total Bookings Panel -->
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-body bk-info text-light">
                <div class="stat-panel text-center">
                  <?php 
                  $qbookings = $conn->query("SELECT COUNT(id) AS total FROM `bookings`") or die($conn->error);
                  $fbookings = $qbookings->fetch_array();
                  ?>
                  <div class="stat-panel-number h1"><?php echo $fbookings['total']; ?></div>
                  <div class="stat-panel-title text-uppercase">Total Bookings</div>
                </div>
              </div>
              <a href="bookinglist.php" class="block-anchor panel-footer text-center">View Bookings <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    window.onload = function() {
      // Ensure required JS libraries for charts are included.
      var ctx = document.getElementById("dashReport").getContext("2d");
      window.myLine = new Chart(ctx).Line(swirlData, {
        responsive: true,
        scaleShowVerticalLines: false,
        scaleBeginAtZero : true,
        multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
      });

      var doctx = document.getElementById("chart-area3").getContext("2d");
      window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive: true});

      var doctx = document.getElementById("chart-area4").getContext("2d");
      window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive: true});
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      setTimeout(function() {
        $('.succWrap').slideUp("slow");
      }, 3000);
    });
  </script>

  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script src="../js/main1.js"></script>
</body>
</html>
