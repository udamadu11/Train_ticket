<?php include('include/connection.php') ?>
<?php include('include/session.php') ?>
<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['first_name']) || $_SESSION['role'] != '4'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Ticket</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="passenger.php" class="navbar-brand d-flex align-items-center">
        <strong>E-Train</strong>
      </a>
      <form method="post" action="logout.php">
		<a href ="logout.php" target="_header" name="logout">Log Out</a>
	</form>
    </div>
  </div>
</header>
	<div class="container" style="margin-top: 50px;">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>Tickets</center>
		</div>
		<table class="table table-hover">
	<tr tr style="font-size: 16px;padding: 10 10px;font-weight: bold;">
		<th>From</th>
		<th>TO</th>
		<th>Date</th>
		<th>Price</th>
		<th>Quantity</th>
        <th>Total</th>
		<th>Action</th>
	</tr>
	<?php
        $user = $_SESSION['first_name'];
		//retrive all the data from routes table
		$sql = "SELECT * FROM reservation WHERE user_name = '$user'";
		//Performs a query on Database
		$result = mysqli_query($con,$sql);

		if ($result -> num_rows > 0) {//Return the number of rows in result set
			while ($row = $result -> fetch_assoc()) { //Fetch a result row as an associative array
				echo "
			<tr>
				<td>".$row['from_where']."</td>
				<td>".$row['to_where']."</td>
				<td>".$row['date']."</td>
				<td>".$row['price']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['total']."</td>
				<td>
					<form method=\"post\" action=\"#\">
						<input type=\"hidden\" name=\"edit\" value=".$row['id'].">
						<input type=\"submit\" name=\"submit\" value=\"View\" class=\"btn btn-primary\" style=\"width:100px;\">
					</form>
				</td>
				<td>
					<form method=\"post\">
						<input type=\"hidden\" value=".$row['id']." name=\"delete\">
						<input class=\"btn btn-danger\" type=\"submit\" name=\"submit2\" value=\"Delete\" style=\"width:100px;\">
					</form>
				</td>
			</tr>
		";
			}
		echo "</table>";
		}
	?>
</table>
	</div>

</body>
</html>
<?php 
if (isset($_POST['submit2'])) {
	$d_id = $_POST['delete'];
	//Delete Data from routes table by id After clicking delete button
	$delete_query ="DELETE FROM reservation WHERE id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	if ($delete_result) {
		//after performs a query on database get alet 
		echo "<script>alert('Successfuly Removed...')</script>";
            echo "<script>window.open('viewReservation.php','_self')</script>";
	}
	}
	mysqli_close($con);
?>