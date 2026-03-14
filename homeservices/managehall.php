<?php require_once '../../homeservices/scripts/checklogin.php'; ?>


    include_once "scripts/DB.php";

    // Check if the user is an admin, if not redirect to logout
    if (!check("admin")) {
        header('Location: logout.php');
        exit();
    }

    // Fetch providers' data
    $stmt = DB::query("SELECT * FROM providers");
    $providers = $stmt->fetchAll(PDO::FETCH_OBJ);

    include_once "msg/managehall.php"; // Message management
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Providers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container" style="margin-top: 30px; margin-bottom: 60px;">
    <h2>Manage Providers</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Profession</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($providers as $provider): ?>
                <tr>
                    <td>
                        <img src="images/<?= htmlspecialchars($provider->photo); ?>" 
                             alt="Provider Photo" style="height: 150px;">
                    </td>
                    <td><?= htmlspecialchars($provider->name); ?></td>
                    <td><?= htmlspecialchars($provider->contact); ?></td>
                    <td>
                        <?= htmlspecialchars($provider->adder1); ?>,<br>
                        <?= htmlspecialchars($provider->adder2); ?>,<br>
                        <?= htmlspecialchars($provider->city); ?>
                    </td>
                    <td><?= htmlspecialchars($provider->profession); ?></td>
                    <td>
                        <form action="deletehall.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($provider->id); ?>">
                            <button type="submit" name="remove" class="btn btn-danger btn-block">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
