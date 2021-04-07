<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['first_name']) || $_SESSION['role'] != '3'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<frameset rows="8%,92%" border="0px">
  		<frame src="header.php" border="0px">
  			<frameset cols="14%,86%" border="0px">
    			<frame src="stSidebar.php" border="0px">
          <frame src="stDashboard.php" name="main" border="0px">
  			</frameset>
	</frameset>
</head>
<body>

</body>
</html>