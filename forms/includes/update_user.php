<?php
	if(ISSET($_POST['submit'])){
		$user_no = $_SESSION['user_no'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
	    $image = rand(1000,10000)."-".$_FILES["image"]["name"];
		$filetmpname = $_FILES["image"]["tmp_name"];
		$folder = './uploads/';
		move_uploaded_file($filetmpname, $folder.'/'.$image);
		
		$conn = new mysqli("localhost","root","","hsp") or die(mysqli_error());
		$conn->query("UPDATE `users` SET `email` = '$email', `name` = '$name', `contact` = '$contact', `address` = '$address', `image`= '$image' WHERE `user_no` = '$user_no'") or die(mysqli_error());
		header("location: user.php");
	}
?>
