<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['role']) || $_SESSION['role'] != '1'){
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
		<a href="adminDashboard.php" target="main" style="margin-top: 20px;">DashBoard</a>
		<a href="viewRoutes.php" target="main">View Routes</a>
        <a href="addUsers.php" target="main">Add Users</a>
        <a href="adminUserEdit.php" target="main">Users</a>
		</div>
	</div>
</body>
</html>
