<?php include('include/connection.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>View Routes Price</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>List of Routes Price</center>
		</div>
		<table class="table table-hover">
	<tr tr style="font-size: 16px;padding: 10 10px;font-weight: bold;">
		<th>From</th>
		<th>TO</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	<?php
		//retrive all the data from routes table
		$sql = "SELECT * FROM routes";
		//Performs a query on Database
		$result = mysqli_query($con,$sql);

		if ($result -> num_rows > 0) {//Return the number of rows in result set
			while ($row = $result -> fetch_assoc()) { //Fetch a result row as an associative array
				echo "
			<tr>
				<td>".$row['from_where']."</td>
				<td>".$row['to_where']."</td>
				<td>".$row['price']."</td>
				<td>
					<form method=\"post\" action=\"editPrice.php\">
						<input type=\"hidden\" name=\"edit\" value=".$row['id'].">
						<input type=\"submit\" name=\"submit\" value=\"Edit\" class=\"btn btn-primary\" style=\"width:100px;\">
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