<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 

	$errors = array('from_where'=>'', 'to_where'=>'', 'price'=>'', 'time'=>'');

	if(isset($_POST['submit'])){ 
		$from_where=$_POST['from_where'];
		$to_where=$_POST['to_where'];
		$price=$_POST['price'];
        $time=$_POST['time'];

		if (empty($_POST['from_where'])||empty($_POST['to_where'])||empty($_POST['price'])||empty($_POST['time'])) {
			
			//check first Name:
		if (empty($_POST['from_where'])) {
			$errors['from_where'] = 'Required';
		}

		// check Last name:
		if (empty($_POST['to_where'])) {
			$errors['to_where'] = 'Required';
		}

		//check Address:
		if (empty($_POST['price'])) {
			$errors['price'] = 'Required';
		}


		//check telephone number:
		if (empty($_POST['time'])) {
			$errors['time'] = 'Required';
		}

		}

		else{
			//Insert Query of users add
			$sql = "INSERT INTO routes (from_where,to_where,price,time_sc) VALUES ('$from_where','$to_where','$price','$time')";
			$sqlResult = mysqli_query($con, $sql);
			//$massage = base64_encode(urlencode("Successfully Added"));
			//header('Location:addUser.php?msg=' .$massage);
			if ($sqlResult) {
			echo "<script>alert('Successfuly add...')</script>";
			}
			exit();
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Add</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-left:300px;margin-top:100px;">
        <form style="width:50%;margin-top: 10px;" method="POST">
            <div class="alert alert-primary" role="alert">
                <center>Add Route</center>
            </div>
            <div class="mb-3">
                <label for="from_where" class="form-label">From</label>
                <input type="text" class="form-control" name="from_where">
                <div class="redText"> <?php echo $errors['from_where']; ?>	</div>
            </div>

            <div class="mb-3">
                <label for="to_where" class="form-label">To</label>
                <input type="text" class="form-control" name="to_where">
                <div class="redText"> <?php echo $errors['to_where']; ?>	</div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
                <div class="redText"> <?php echo $errors['price']; ?>	</div>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" class="form-control" name="time">
                <div class="redText"> <?php echo $errors['time']; ?>	</div>
            </div>
           
            <button type="submit" class="btn btn-primary" name="submit" style="width:560px" >Add</button>
        </form>
    </div>
</body>
</html>