<?php include_once "./include/header.php"; ?>

<?php
// Array of cities
$cities = ["Ahmednagar", "Akola", "Akot","Akluj", "Amalner", "Ambejogai", "Amravati", "Anjangaon", "Arvi", "Aurangabad", "Bhiwandi", "Dhule", "Kalyan-Dombivali","Indapur", "Ichalkaranji", "Kalyan-Dombivali", "Karjat", "Latur", "Loha", "Lonar", "Lonavla", "Mahad", "Malegaon", "Malkapur", "Mangalvedhe", "Mangrulpir", "Manjlegaon", "Manmad", "Manwath", "Mehkar", "Mhaswad", "Mira-Bhayandar", "Morshi", "Mukhed", "Mul", "Greater Mumbai*", "Murtijapur", "Nagpur", "Nanded-Waghala", "Nandgaon", "Nandura", "Nandurbar", "Narkhed", "Nashik", "Navi Mumbai", "Nawapur", "Nilanga", "Osmanabad", "Ozar","Phaltan", "Pachora", "Paithan", "Palghar", "Pandharkaoda", "Pandharpur", "Panvel", "Parbhani", "Parli", "Partur", "Pathardi", "Pathri", "Patur", "Pauni", "Pen", "Phaltan", "Pulgaon", "Pune", "Purna", "Pusad", "Rahuri", "Rajura", "Ramtek", "Ratnagiri", "Raver", "Risod", "Sailu", "Sangamner", "Sangli", "Sangole", "Sasvad", "Satana", "Satara", "Savner", "Sawantwadi", "Shahade", "Shegaon", "Shendurjana", "Shirdi", "Shirpur-Warwade", "Shirur", "Shrigonda", "Shrirampur", "Sillod", "Sinnar", "Solapur", "Soyagaon", "Talegaon Dabhade", "Talode", "Tasgaon", "Thane", "Tirora", "Tuljapur", "Tumsar", "Uchgaon", "Udgir", "Umarga", "Umarkhed", "Umred", "Uran", "Uran Islampur", "Vadgaon Kasba", "Vaijapur", "Vasai-Virar", "Vita", "Wadgaon Road", "Wai", "Wani", "Wardha", "Warora", "Warud", "Washim", "Yavatmal", "Yawal", "Yevla"];
?>
<?php include_once "msg/register.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Service Provider</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Update path -->
    <link rel="stylesheet" href="path/to/your/style.css"> <!-- Update path -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f2f2f2;
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

        /* Styling the back link */
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

        /* Style for "click here" link */
        .click-here-link {
            color: #0000FF; /* Blue text for click here */
            text-decoration: underline;
        }

        /* Black header for the form */
        .card-title h3 {
            color: #000;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center">Register as Service Provider</h3>
            </div>
            <hr>

            <form action="scripts/register.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input id="contact"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        name="contact" type="text" class="form-control" placeholder="Contact" minlength="10"
                        maxlength="10" required>
                </div>

                <div class="form-group">
                    <label for="adder1">Address Line 1</label>
                    <input id="adder1" name="adder1" type="text" class="form-control" placeholder="Enter Address line-1"
                        required>
                </div>

                <div class="form-group">
                    <label for="adder2">Address Line 2</label>
                    <input id="adder2" name="adder2" type="text" class="form-control" placeholder="Enter Address line-2"
                        required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" name="city" id="city">
                        <?php foreach ($cities as $city) : ?>
                        <option value="<?= $city ?>"> <?= $city ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo">Photo (Square Size)</label>
                    <input id="photo" name="photo" type="file" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="descr">Add Description</label>
                    <textarea name="descr" id="descr" class="form-control" cols="30" rows="5" placeholder="Tell something about you..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter 6 Character Password" minlength="4" required>
                </div>

               <div class="form-group">
    <label for="profession">Profession</label>
    <select class="form-control" name="profession" id="profession">
        <option value="none">Select Profession</option>
        <option value="electrician">Electrician</option>
        <option value="plumber">Plumber</option>
        <option value="Plumber Tap Repair">Plumber Tap Repair</option>
        <option value="Plumber Pipe Fixing">Plumber Pipe Fixing</option>
        <option value="pest control">Pest Control</option>
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


                <button style="margin-top: 30px;" class="btn btn-block btn-navy-blue" type="submit" name="register" id="register">Register</button>
                
                <div class="form-group row mb-0">
    <div class="col"style="color: #000;">
        <span>Already have an account?</span> <a class="click-here-link" href="login.php">Click here</a> to login.
    </div>
</div>
  <!-- Back Link -->
<a href="http://localhost/Hsp/mainpage.php" style="margin-top: 20px; color: #007bff; text-decoration: none; font-size: 16px;">
    ← Back
</a>


            </form>
        </div>
    </div>
</div>

</body>
</html>