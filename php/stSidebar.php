<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['role']) || $_SESSION['role'] != '3'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="sidenav">
		<a href="#" target="main" style="margin-top: 20px;">DashBoard</a>
		<a href="viewPrice.php" target="main" style="margin-top: 20px;">Price Update</a>
        <a href="viewTimeSchedule.php" target="main" style="margin-top: 20px;">Time Update</a>
	</div>
</body>
</html>
