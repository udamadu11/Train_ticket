<?php include('include/connection.php') ?>
<?php include('include/session.php') ?>
<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['first_name']) || $_SESSION['role'] != '1'){
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

	<div class="container" style="margin-top: 50px;">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>Users</center>
		</div>
		<table class="table table-hover">
	<tr tr style="font-size: 16px;padding: 10 10px;font-weight: bold;">
		<th>First Name</th>
		<th>Last Name</th>
		<th>email</th>
		<th>NIC</th>
		<th>Address</th>
        <th>Phone Number</th>
        <th>Role</th>
		<th>Action</th>
	</tr>
	<?php
		$sql = "SELECT * FROM users";
		//Performs a query on Database
		$result = mysqli_query($con,$sql);

		if ($result -> num_rows > 0) {//Return the number of rows in result set
			while ($row = $result -> fetch_assoc()) { //Fetch a result row as an associative array
				echo "
			<tr>
				<td>".$row['first_name']."</td>
				<td>".$row['last_name']."</td>
				<td>".$row['email']."</td>
				<td>".$row['nic']."</td>
                <td>".$row['address']."</td>
                <td>".$row['phone_number']."</td>
                <td>".$row['role']."</td>
				
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
	$delete_query ="DELETE FROM users WHERE id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	if ($delete_result) {
		//after performs a query on database get alet 
		echo "<script>alert('Successfuly Removed...')</script>";
            echo "<script>window.open('adminUserEdit.php','_self')</script>";
	}
	}
	mysqli_close($con);
?>