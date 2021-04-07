<?php
	require_once('include/connection.php');//include databse connection

	session_start();
	if(isset($_SESSION['first_name'])){
		// remove  session variables
		session_unset($_SESSION['first_name']);
		session_unset($_SESSION['role']);
		session_unset($_SESSION['id']);
		header("Location: login.php");
		exit();
	}
?>