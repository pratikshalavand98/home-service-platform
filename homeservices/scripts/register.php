<?php

require_once 'session.php';
require_once 'DB.php';
require_once 'helpers.php';

if (isset($_POST['register'])) {
    // Sanitize input data
    $input = clean($_POST);

    $name = $input['name'];
    $contact = $input['contact'];
    $descr = $input['descr'];
    $adder1 = $input['adder1'];
    $adder2 = $input['adder2'];
    $city = $input['city'];
    $password = $input['password'];
    $profession = $input['profession'];

    // Handle the uploaded photo
    $photo = $_FILES['photo'];
    $file1 = upload($photo);

    // Check if the upload failed
    if ($file1 === false) {
        header('Location: ../register.php?msg=file');
        exit();
    }

    // Insert provider details into the database
    $isProviderCreated = DB::query("INSERT INTO providers (name, contact, descr, adder1, adder2, city, password, photo, profession) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
        $name, $contact, $descr, $adder1, $adder2, $city, $password, $file1, $profession
    ]);

    // Check if the record was created successfully
    if ($isProviderCreated) {
        header('Location: ../register.php?msg=success');
        exit();
    } else {
        // Remove uploaded file if database insertion failed
        unlink('../storage/' . $file1);
        header('Location: ../register.php?msg=failed');
        exit();
    }
}
?>
