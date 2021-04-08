<?php include('include/connection.php'); ?><!-- Include database connection -->
<?php include('include/session.php'); ?>
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
	<title>Issue Drug</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
  		<center>Travel Distance</center>
		</div>
  			<form method="post">
  			<div class="row">
				<div class="col-md-4">
					<input type="text" class="form-control"  name="from_where" placeholder="From Where">
				</div>
                <div class="col-md-4">
                    <input type="text" class="form-control"  name="to_where" placeholder="To Where">
                </div>
				<div class="col-md-4">
					<input type="submit" name="submit" value="Search" class="btn btn-info" style="width: 150px;">
				</div>
            </div>
    </form>
    	<hr>

	<?php
include('include/connection.php');
	if (isset($_POST['submit'])) {
			$from = $_POST['from_where'];
            $to = $_POST['to_where'];

			$search_id = "SELECT * FROM routes WHERE from_where = '$from' AND to_where = '$to'";
			//Performs a query on database
			$query= mysqli_query($con,$search_id);
			echo "<table class=\"table\">
				<tr>
					<th>From</th>
					<th>To</th>
					<th>Price</th>
					<th>Time</th>
				</tr>";
			//Return number of rows in result set 
			if (mysqli_num_rows($query) > 0) {
						//Fetch Result rows as an associative array
						while($row = mysqli_fetch_assoc($query)){
							//After searching show drug table data from batch table ordered by date
							echo "<tr>
									<td>".$row['from_where']."</td>
									<td>".$row['to_where']."</td>
									<td>".$row['price']."</td>
									<td>".$row['time_sc']."</td>
									<td>
										<form method=\"post\">
											<div class=\"form-group\">
	    								
	    										<input type=\"number\" class=\"form-control\"  placeholder=\"Quantity\" name=\"quantity\" min=\"1\">
	 										</div>
	 								</td>
	 								<td>
											<input type=\"hidden\" value=".$row['from_where']." name=\"from_where\">
											<input type=\"hidden\" value=".$row['to_where']." name=\"to_where\">
											<input type=\"hidden\" value=".$row['price']." name=\"price\">
											<input type=\"submit\" name=\"btn\" class=\"btn btn-success\" value=\"Add\"> 
										

									</td>
										</form>
								</tr>
								
								";
						}
					}else{
			echo "<script>alert('Invalid')</script>";
		}		
	}
		
		if (isset($_POST['btn'])) {
		$from = $_POST['from_where'];
		$to = $_POST['to_where'];
		$price = $_POST['price'];
		$qty = $_POST['quantity'];
		$total = $price * $qty;
		$user = $_SESSION['first_name'];
		$uid = $_SESSION['id'];

		$s = "INSERT INTO traval (user_name,uid,from_where,to_where,price,quantity,total,date)VALUES('$user','$uid','$from','$to','$price','$qty','$total',now())";
		$r = mysqli_query($con,$s);
		if($r){
			echo "<script>alert('success')</script>";
			echo "<script>window.open('passenger.php','_self')</script>";
		}	
		}
	?>
	</div>
</body>
</html>
