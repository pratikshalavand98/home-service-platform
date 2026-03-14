<?php

include_once "./include/header.php";
$cities = ["Ahmednagar", "Akola", "Akot","Akluj", "Amalner", "Ambejogai", "Amravati", "Anjangaon", "Arvi", "Aurangabad", "Bhiwandi", "Dhule", "Kalyan-Dombivali","Indapur", "Ichalkaranji", "Kalyan-Dombivali", "Karjat", "Latur", "Loha", "Lonar", "Lonavla", "Mahad", "Malegaon", "Malkapur", "Mangalvedhe", "Mangrulpir", "Manjlegaon", "Manmad", "Manwath", "Mehkar", "Mhaswad", "Mira-Bhayandar", "Morshi", "Mukhed", "Mul", "Greater Mumbai*", "Murtijapur", "Nagpur", "Nanded-Waghala", "Nandgaon", "Nandura", "Nandurbar", "Narkhed", "Nashik", "Navi Mumbai", "Nawapur", "Nilanga", "Osmanabad", "Ozar","Phaltan", "Pachora", "Paithan", "Palghar", "Pandharkaoda", "Pandharpur", "Panvel", "Parbhani", "Parli", "Partur", "Pathardi", "Pathri", "Patur", "Pauni", "Pen", "Phaltan", "Pulgaon", "Pune", "Purna", "Pusad", "Rahuri", "Rajura", "Ramtek", "Ratnagiri", "Raver", "Risod", "Sailu", "Sangamner", "Sangli", "Sangole", "Sasvad", "Satana", "Satara", "Savner", "Sawantwadi", "Shahade", "Shegaon", "Shendurjana", "Shirdi", "Shirpur-Warwade", "Shirur", "Shrigonda", "Shrirampur", "Sillod", "Sinnar", "Solapur", "Soyagaon", "Talegaon Dabhade", "Talode", "Tasgaon", "Thane", "Tirora", "Tuljapur", "Tumsar", "Uchgaon", "Udgir", "Umarga", "Umarkhed", "Umred", "Uran", "Uran Islampur", "Vadgaon Kasba", "Vaijapur", "Vasai-Virar", "Vita", "Wadgaon Road", "Wai", "Wani", "Wardha", "Warora", "Warud", "Washim", "Yavatmal", "Yawal", "Yevla"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Services</title>
    <link rel="stylesheet" href="path_to_bootstrap.css"> <!-- Add your Bootstrap CSS path here -->
    <style>
      body {
    background-image: url('/HSP/services/home1.png'); /* Your background image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative;
    color: black;
}

body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: inherit;
    background-size: inherit;
    background-position: inherit;
    background-repeat: inherit;
    background-attachment: inherit;
    filter: blur(8px); /* Apply blur to background */
    z-index: -1;
}

.container {
    background-color: rgba(255, 255, 255, 0.8); /* Optional semi-transparent container */
    padding: 20px;
    border-radius: 10px;
    position: relative;
    z-index: 1; /* Ensure the content is above the blurred background */
}

        h2, label, select, table, table th, table td {
            color: black;
        }
    </style>
</head>
<body>
<body>

<a href="http://localhost/Hsp/mainpage.php" style="position: absolute; top: 20px; left: 20px; font-size: 24px; font-weight: bold; color: white; text-decoration: none;">Home</a>

<h2 class="text-center" style="margin-top: 20px;">Home Services</h2>
<hr>
<div class="container" style="margin-top:20px; margin-bottom: 60px;">

    <div class="row">
        <div class="form-group col-5">
            <label for="city">City</label>
            <select class="form-control" name="city" id="city">
                <option value="none">-- Select City --</option>
                <?php foreach ($cities as $city) : ?>
                <option value="<?= $city ?>"> <?= $city ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-5">
            <label for="profession">Who's Required</label>
            <select class="form-control" name="profession" id="profession">
                <option value="none">Select Profession</option>
                <option value="electrician">Electrician</option>
                <option value="plumber">Plumber</option>
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

        <div class="form-group col-2">
            <label for="search">Action</label>
            <button id="search" class="form-control btn btn-success" type="button">Search</button>
        </div>
    </div>

    <div class="table-responsive">
        <table id="providers" class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Profession</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan='5'>Select city and profession..</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="js/jquery.js"></script>
<script>
    $(function() {
        $("#search").click(function() {
            var city = $("#city").val();
            var profession = $("#profession").val();

            if (city == "none" || profession == "none") {
                alert("Don't leave fields empty!");
                tbody = "<tr><td colspan='5'>please </td></tr>";
            } else {
                $.post('scripts/searchproviders.php', {
                    city: city,
                    profession: profession
                }, function(res) {
                    var providers = JSON.parse(res);
                    var tbody = "";

                    if (providers.failed == true) {
                        tbody = "<tr><td colspan='5'>No Service Providers found...</td></tr>";
                    } else {
                        providers.forEach(function(provider, i) {
                            tbody += "<tr>" +
                                "<td><img style='height:150px' src='images/" + provider
                                .photo +
                                "'/></td>" +
                                "<td>" + provider.name + "</td>" +
                                "<td>" + provider.adder1 + ",<br>" + provider.adder2 +
                                ",<br>" +
                                provider.city + "</td>" +
                                "<td>" + provider.profession + "</td>" +
                                "<td><a href='booking.php?provider=" + provider.id +
                                "' class='btn btn-primary btn-block'>Book</a></td>";
                        });
                    }
                    $("#providers tbody").html(tbody);
                });
            }
        });
    });
</script>

</body>
</html>
