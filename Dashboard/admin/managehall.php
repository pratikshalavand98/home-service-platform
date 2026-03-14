<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary scripts for login and database connection
require_once __DIR__ . '/../../homeservices/scripts/checklogin.php';
require_once __DIR__ . '/../../homeservices/scripts/DB.php';

try {
    // Establish connection with PDO
    $dbh = new PDO("mysql:host=localhost;dbname=hsp", "root", "");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle confirmation, unconfirmation, and deletion actions
if (isset($_REQUEST['unconfirm']) || isset($_REQUEST['confirm'])) {
    $aeid = intval($_GET['unconfirm'] ?? $_GET['confirm']);
    $status = isset($_REQUEST['confirm']) ? 1 : 0;
    $sql = "UPDATE providers SET status=:status WHERE id=:aeid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_INT);
    $query->bindParam(':aeid', $aeid, PDO::PARAM_INT);

    $msg = $query->execute() ? ($status ? "Provider confirmed successfully." : "Provider unconfirmed successfully.") : "Failed to update provider status.";
    header("Location: managehall.php?msg=" . urlencode($msg));
    exit();
}

if (isset($_POST['delete']) && isset($_POST['provider_id'])) {
    $aeid = intval($_POST['provider_id']);

    $check_sql = "SELECT * FROM providers WHERE id=:aeid";
    $check_query = $dbh->prepare($check_sql);
    $check_query->bindParam(':aeid', $aeid, PDO::PARAM_INT);
    $check_query->execute();

    if ($check_query->rowCount() > 0) {
        $delete_sql = "DELETE FROM providers WHERE id=:aeid";
        $delete_query = $dbh->prepare($delete_sql);
        $delete_query->bindParam(':aeid', $aeid, PDO::PARAM_INT);

        $result = $delete_query->execute() ? ["status" => "success", "message" => "Provider deleted successfully."] : ["status" => "error", "message" => "Failed to delete provider."];
    } else {
        $result = ["status" => "error", "message" => "Provider not found."];
    }
    echo json_encode($result);
    exit();
}

// Fetch providers data
$providers_query = $dbh->query("SELECT id, photo, name, contact, adder1, adder2, city, profession, status FROM providers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME BASED SERVICES - Manage Providers</title>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Manage Providers</h2>
                        <?php if (isset($_GET['msg'])): ?>
                            <div class="succWrap" id="msgshow"><?php echo htmlentities($_GET['msg']); ?></div>
                        <?php endif; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">List Providers</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Profession</th>
                                                <th>Account</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($provider = $providers_query->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr id="provider-<?php echo $provider['id']; ?>">
                                                    <td><?php echo $provider['id']; ?></td>
                                                    <td>
                                                        <?php if (!empty($provider["photo"]) && file_exists('uploads/' . $provider["photo"])): ?>
                                                            <img src="uploads/<?php echo htmlspecialchars($provider["photo"]); ?>" style="width:50px; border-radius:50%;" alt="<?php echo htmlspecialchars($provider['name']); ?>"/>
                                                        <?php else: ?>
                                                            <img src="images/default.png" style="width:50px; border-radius:50%;" alt="Default Photo"/>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo htmlspecialchars($provider['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($provider['contact']); ?></td>
                                                    <td><?php echo htmlspecialchars($provider['adder1']) . ', ' . htmlspecialchars($provider['adder2']) . ', ' . htmlspecialchars($provider['city']); ?></td>
                                                    <td><?php echo htmlspecialchars($provider['profession']); ?></td>
                                                    <td>
                                                        <label style="font-size: 15px;" class="label label-primary">
                                                            <?php if (isset($provider['status']) && $provider['status'] == 1) { ?>
                                                                <a href="managehall.php?unconfirm=<?php echo $provider['id']; ?>" onclick="return confirm('Do you really want to Un-Confirm the Account?')">
                                                                    <font color="white">Confirmed <i class="fa fa-check-circle"></i></font>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a href="managehall.php?confirm=<?php echo $provider['id']; ?>" onclick="return confirm('Do you really want to Confirm the Account?')">
                                                                    <font color="white">Un-Confirmed <i class="fa fa-times-circle"></i></font>
                                                                </a>
                                                            <?php } ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" onclick="deleteProvider(<?php echo $provider['id']; ?>)" class="delete-provider">
                                                            <i class="fa fa-trash" style="color:red"></i>
                                                        </a>
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
    </div>
<body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/fileinput.js"></script>
<script src="../js/chartData.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function () {
      $('.succWrap').slideUp("slow");
    }, 3000);
  });
</script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../js/main1.js"></script>
</html>
