<?php
	$dbsevername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "train_ticket";

	$con = mysqli_connect($dbsevername, $dbUsername, $dbPassword,$dbName);
	if(!$con){
		echo "No Connection";
	}
?>