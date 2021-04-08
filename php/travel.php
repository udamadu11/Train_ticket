<?php include('include/connection.php'); ?><!-- Include database connection -->
<?php include('include/session.php'); ?>
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
	<div class="container" style="margin-top: 50px;">
		
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
			echo "<script>alert('Invalid Drug Name')</script>";
		}		
		}

		
// 		if (isset($_POST['btn'])) {
// 		$drug_id = $_POST['drug_id'];
// 		$available_quantity = $_POST['available_quantity'];
// 		$batch_no = $_POST['batch_no'];
// 		$qty = $_POST['quantity'];

// 				//check Availbale quantity and quatity of drug are enough to issue
// 				if ($available_quantity >= $qty) {
// 					//Retrive Query of drug by drug id
// 					$sq = "SELECT * FROM drug WHERE drug_id = '$drug_id'";
// 					$re = mysqli_query($con,$sq);
// 					$row = mysqli_fetch_array($re);

// 					$drug_name = $row['drug_name'];
// 					$price = $row['price'];
// 					$total = $qty * $price;

// 					//Insert issue drug to temporary table 
// 					$s = "INSERT INTO invoice_temp(drug_id,drug_name,price,qty,total,batch_no)VALUES('$drug_id','$drug_name','$price','$qty','$total','$batch_no')";
// 					$r = mysqli_query($con,$s);

// 					//Update from batch after issuing drug
// 					$available = $available_quantity - $qty;
// 					$updateQury = "UPDATE batch SET available_quantity = '$available' WHERE drug_id = '$drug_id' AND batch_no = '$batch_no'";
// 					$updateRe = mysqli_query($con,$updateQury);


// 					$sqlStock = "SELECT * FROM stock WHERE drug_id = '$drug_id'";
// 					$resultStock = mysqli_query($con,$sqlStock);
// 					$rowStock = mysqli_fetch_array($resultStock);
// 					$avail = $rowStock['current_stock'];

// 					//Update from stock after issuing drug
// 					$available = $avail - $qty;
// 					$updateStock = "UPDATE stock SET current_stock = '$available' WHERE drug_id = '$drug_id'";
// 					$updateResultStock = mysqli_query($con,$updateStock);
// 		}else{
// 			echo "<script>alert('Sorry ,Not Enough')</script>";
//            	echo "<script>window.open('issueDrug.php','_self')</script>";
// 		}
// 	}
// 	$total = 0;
// 		echo "

// 		<table class=\"table\" style=\"margin-top: 10px;border: 2px solid green;padding: 40px;\">
// 		<tr>
// 			<th>Id</th>
// 			<th>Drug Id</th>
// 			<th>Drug Name</th>
// 			<th>Price</th>
// 			<th>Quantity</th>
// 			<th>Total</th>
// 			<th>Action</th>
// 		</tr>";
// 				echo "
// 				<div class=\"alert alert-info\" role=\"alert\" style=\"text-align: center;\">
// 				  	<h2>Invoice</h2>
// 				 </div>
// 				";
		
// 			$q = "SELECT * FROM invoice_temp";
// 				$rr =mysqli_query($con,$q);
// 		while($row1 = mysqli_fetch_array($rr)){
// 			//Display issue drug list
// 					echo "
		
// 				<tr>
// 					<td>".$row1['id']."</td>
// 					<td>".$row1['drug_id']."</td>
// 					<td>".$row1['drug_name']."</td>
// 					<td>".$row1['price']."</td>
// 					<td>".$row1['qty']."</td>
// 					<td>".$row1['total']."</td>
// 					<td>
// 								<form method=\"post\" class=\"delete\">
// 									<input type=\"hidden\" value=".$row1['drug_id']." name=\"drug_id\">
// 									<input type=\"hidden\" value=".$row1['batch_no']." name=\"batch_no\">
// 									<input type=\"hidden\" value=".$row1['qty']." name=\"qty\">
// 									<input class=\"btn btn-danger\" type=\"submit\" name=\"deli\" value=\"remove\" style=\"width:100px;\">
// 								</form>

// 					</td>
					
// 				</tr>

// 				<tr></tr>
// 				"; 
// 				$total += $row1['total'];//Get tatal value from issue drugs
				
// }
// 				echo "
// 					<tr>
// 						<td></td>
// 						<td></td>
// 						<td></td>
// 						<td></td>
// 						<td>Total</td>
// 						<td></td>
// 						<td><input type=\"number\" class=\"form-control\" name=\"total\" min=\"1\" style=\"width:100px;\" value='".$total."'></td>
// 					</tr>

// 					<tr>
// 						<td></td>
// 						<td></td>
// 						<td></td>
// 						<td></td>
// 						<td></td>
// 						<td></td>
// 						<td>
// 							<form method=\"post\" action=\"bill.php\">
// 							<input type=\"submit\" name=\"btn2\" class=\"btn btn-success\" value=\"Issue\" style=\"width:100px;\">
// 							</form>
// 						</td>
// 					</tr>

// 				";
		?>
		</div>
</body>
</html>
<!--
-->