<?php
include_once "scripts/checklogin.php";
include_once "include/header.php";

if (!check()) {
    header('Location: logout.php');
    exit();
}

$provider = $_SESSION['user'];

$cities = ["Ahmednagar", "Akola", "Akot","Akluj", "Amalner", "Ambejogai", "Amravati", "Anjangaon", "Arvi", "Aurangabad", "Bhiwandi", "Dhule", "Kalyan-Dombivali","Indapur", "Ichalkaranji", "Kalyan-Dombivali", "Karjat", "Latur", "Loha", "Lonar", "Lonavla", "Mahad", "Malegaon", "Malkapur", "Mangalvedhe", "Mangrulpir", "Manjlegaon", "Manmad", "Manwath", "Mehkar", "Mhaswad", "Mira-Bhayandar", "Morshi", "Mukhed", "Mul", "Greater Mumbai*", "Murtijapur", "Nagpur", "Nanded-Waghala", "Nandgaon", "Nandura", "Nandurbar", "Narkhed", "Nashik", "Navi Mumbai", "Nawapur", "Nilanga", "Osmanabad", "Ozar","Phaltan", "Pachora", "Paithan", "Palghar", "Pandharkaoda", "Pandharpur", "Panvel", "Parbhani", "Parli", "Partur", "Pathardi", "Pathri", "Patur", "Pauni", "Pen", "Phaltan", "Pulgaon", "Pune", "Purna", "Pusad", "Rahuri", "Rajura", "Ramtek", "Ratnagiri", "Raver", "Risod", "Sailu", "Sangamner", "Sangli", "Sangole", "Sasvad", "Satana", "Satara", "Savner", "Sawantwadi", "Shahade", "Shegaon", "Shendurjana", "Shirdi", "Shirpur-Warwade", "Shirur", "Shrigonda", "Shrirampur", "Sillod", "Sinnar", "Solapur", "Soyagaon", "Talegaon Dabhade", "Talode", "Tasgaon", "Thane", "Tirora", "Tuljapur", "Tumsar", "Uchgaon", "Udgir", "Umarga", "Umarkhed", "Umred", "Uran", "Uran Islampur", "Vadgaon Kasba", "Vaijapur", "Vasai-Virar", "Vita", "Wadgaon Road", "Wai", "Wani", "Wardha", "Warora", "Warud", "Washim", "Yavatmal", "Yawal", "Yevla"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service Provider Information</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Update path -->
    <link rel="stylesheet" href="path/to/your/style.css"> <!-- Update path -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f2f2f2;
        }
.logout-link {
    background-color: transparent; /* Remove grey background */
    color: black; /* Make text black */
}


        .container {
            margin-top: 30px;
            max-width: 800px;
            margin-bottom: 60px;
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
        }

        .form-control:focus, .form-control-file:focus {
            border-color: #001f3f;
            box-shadow: 0 0 0 0.2rem rgba(0, 31, 63, 0.1);
        }

        .form-group label {
            color: #000; /* Black text color for labels */
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
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3  class="text-center" style="color: black;">Update Service Provider Information</h3>
            </div>
            <hr>

            <form action="scripts/updatehall.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?= $provider->name; ?>" id="name" name="name" type="text" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input value="<?= $provider->contact; ?>" id="contact" name="contact" type="text" class="form-control" placeholder="Contact" minlength="10" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label for="adder1">Address Line 1</label>
                    <input value="<?= $provider->adder1; ?>" id="adder1" name="adder1" type="text" class="form-control" placeholder="Enter Address line-1" required>
                </div>

                <div class="form-group">
                    <label for="adder2">Address Line 2</label>
                    <input value="<?= $provider->adder2; ?>" id="adder2" name="adder2" type="text" class="form-control" placeholder="Enter Address line-2" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" name="city" id="city">
                        <?php foreach ($cities as $city) : ?>
                        <option value="<?= $city ?>" <?= ($provider->city === $city) ? 'selected' : ''; ?>><?= $city ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-2 text-center">
                            <img style="height: 100px;" src="images/<?= $provider->photo; ?>" alt="Old Photo">
                            <div class="text-center">Old Photo</div>
                        </div>
                        <div class="col">
                            <label for="photo">New Photo</label>
                            <input id="photo" name="photo" type="file" class="form-control-file" required>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 15px;">
                    <label for="descr">Description</label>
                    <textarea name="descr" id="descr" class="form-control" cols="30" rows="5" placeholder="Add Description About Your Hall" required><?= $provider->descr; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input value="<?= $provider->password; ?>" id="password" name="password" type="password" class="form-control" placeholder="Enter 6 Character Password" minlength="4" required>
                </div>

                 <div class="form-group">
                    <label for="" style="color: black;">Profession</label>
                    <select class="form-control" name="profession" id="profession">
                        <option value="electrician">Electrician</option>
                        <option value="plumber">Plumber</option>
                        <option value="mobile">Mobile Repairer</option>
                         <option value="Plumber Tap Repair">Plumber Tap Repair</option>
                         <option value="Plumber Pipe Fixing">Plumber Pipe Fixing</option>
                           <option value="pest control">pest control</option>
                          <option value="Termite Control">Termite Control</option>
                      <option value="Rodent Control">Rodent Control</option>
                      <option value="Cockroach Control">Cockroach Control</option>
                        <option value="Home Cleaning">Home Cleaning</option>
                       <option value="Deep Cleaning">Deep Cleaning</option>
                           <option value="Regular Cleaning">Regular Cleaning</option>
                          <option value="Move-In/Move-Out Cleaning">Move-In/Move-Out Cleaning</option>
                <option value="Gardening">Gardening</option>
                <option value="Lawn Care">Lawn Care</option>
                <option value="Tree Trimming">Tree Trimming</option>
                <option value="Garden Design">Garden Design</option>
                <option value="Carpentry">Carpentry</option>
                <option value="Furniture Repair">Furniture Repair</option>
                <option value="Custom Carpentry">Custom Carpentry</option>
                 <option value="Cabinet Installation">Cabinet Installation</option>
                <option value="Cooking">Cooking</option>
                 <option value="Personal Chef">Personal Chef</option>
                 <option value="Meal Preparation">Meal Preparation</option>
                  <option value="Painting">Painting</option>
                  <option value="Interior Painting">Interior Painting</option>
                  <option value="Exterior Painting">Exterior Painting</option>
                     <option value="Wallpaper Installation">Wallpaper Installation</option>

                    </select>
                </div>

                </div>

                 <button style="margin-top: 20px;" class="btn btn-success btn-block" type="submit" name="register" id="register">Update</button>

        </div>
    </div>
</div>


</body>
</html>