<?php
	session_start();
	error_reporting(0);
		if(!ISSET($_SESSION['user_no']))
			{
				header('location:index.php');
			}
?>

