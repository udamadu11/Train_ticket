<?php require_once('include/connection.php'); ?><!-- include database connection -->
<?php require_once('include/session.php'); ?><!-- include Session file-->
<?php 

	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$password = $_POST['password'];
		$passwordHash = md5($password);
		//Select user name and password 
		$sql = "SELECT * FROM users WHERE first_name='$name' AND password='$passwordHash'";
		//Performs a query on database
		$res = mysqli_query($con, $sql);
		$check_user = mysqli_num_rows($res);
		//Return number of result row in result set
		if ($check_user == 1) {
			//Fetch results row as an associative array
			$row = mysqli_fetch_array($res);

			//creating session
			checkSession();
			$_SESSION["first_name"] = $row['first_name'];
			$_SESSION["id"] = $row['id'];
			$_SESSION["role"] = $row['role'];

			$type = $row['role'];
			
			if($type == '1'){
				header("Location: admin.php");
			}
			elseif($type == '2'){
				header("Location: government.php");
			}
			elseif($type == '3'){
				header("Location: station_master.php");
			}
			elseif($type == '4'){
				header("Location: passenger.php");
			}
		}
		else{
			//Generate error msg
			$message = base64_encode(urlencode("Invalid User Name or Password"));
        	header('Location:login.php?msg=' . $message);
        	exit();
		}

	}
	mysqli_close($con);
?>