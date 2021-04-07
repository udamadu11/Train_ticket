<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="topnav">
		<img src="../img/man11.png">
		<h4>E-Train</h4>	

		<?php  
			checkSession();
			if(isset($_SESSION['first_name'])){
				//admin
				$u_name = $_SESSION['first_name'];
				if("{$_SESSION['role']}" == '1'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_header\" name=\"logout\">Log Out</a>
						</form>";
					//echo "<a href =\"logout.php\" target=\"_top\">Log Out</a>";
					echo "<p>You are Logged in as ". $_SESSION['first_name'] ."</p>";	
				}
				//Government
				if("{$_SESSION['role']}" == '2'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_header\" name=\"logout\">Log Out</a>
						</form>";
					echo "<p>You are Logged in as ". $_SESSION['first_name'] ."</p>";	
				}
				//station Master
				if("{$_SESSION['role']}" == '3'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_header\" name=\"logout\">Log Out</a>
						</form>";
				
					echo "<p>You are Logged in as ". $_SESSION['first_name'] ."</p>";	
				}
				//passenger
				if("{$_SESSION['role']}" == '4'){
					echo "<form method=\"post\" action=\"logout.php\">
								<a href =\"logout.php\" target=\"_header\" name=\"logout\">Log Out</a>
						</form>";
					echo "<p>You are Logged in as ". $_SESSION['first_name'] ."</p>";	
				}

			}
			else{
				echo "<a href=\"login.php\">Login</a>";
			}

			
		?>
		

	</div>

</body>
</html>