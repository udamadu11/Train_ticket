<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 

	$errors = array('first_name'=>'', 'last_name'=>'', 'email'=>'', 'nic'=>'',  'address'=>'', 'phone_number'=>'', 'nic'=>'', 'password'=>'');

	if(isset($_POST['submit'])){ 
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$email=$_POST['email'];
        $address=$_POST['address'];
		$phone_number=$_POST['phone_number'];
		$nic=$_POST['nic'];
		$password=$_POST['password'];
		$role=$_POST['role'];
		$passwordHash= md5($password);
		if (empty($_POST['first_name'])||empty($_POST['last_name'])||empty($_POST['address'])||empty($_POST['email'])||empty($_POST['phone_number'])||empty($_POST['nic'])||empty($_POST['password'])||empty($_POST['role'])) {
			
			//check first Name:
		if (empty($_POST['first_name'])) {
			$errors['first_name'] = 'First Name is Required';
		}

		// check Last name:
		if (empty($_POST['last_name'])) {
			$errors['last_name'] = 'Last Name is Required';
		}

		//check Address:
		if (empty($_POST['address'])) {
			$errors['address'] = 'Address is Required';
		}

		//check an email
		if (empty($_POST['email'])) {
			$errors['email'] = 'An Email is Required';
		}else{
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'An Email Must Be Valid Email Address';
			}
		}

		//check telephone number:
		if (empty($_POST['phone_number'])) {
			$errors['phone_number'] = 'Telephone number is Required';
		}

		//check nic
		if (empty($_POST['nic'])) {
			$errors['nic'] = 'National Identity Number is Required';
		}

		//check password
		if (empty($_POST['password'])) {
			$errors['password'] = 'Password is Required';
		}
		}

		else{
			//Insert Query of users add
			$sql = "INSERT INTO users (first_name,last_name,address,email,phone_number,nic,password,role) VALUES ('$first_name','$last_name','$address','$email','$phone_number','$nic','$passwordHash','$role')";
			$sqlResult = mysqli_query($con, $sql);
			//$massage = base64_encode(urlencode("Successfully Added"));
			//header('Location:addUser.php?msg=' .$massage);
			if ($sqlResult) {
			echo "<script>alert('Successfuly Sign Up...')</script>";
			}
			exit();
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
    <form class="form" method="post">
		<h3 class="error-msg"><?php include('include/message.php'); ?></h3> 
		<h2>User Registration</h2>
		<div class="input_field-5">

				<p>First Name</p>
				<input type="text"  name="first_name" id="first_name" placeholder="Enter First Name" required>
				<div class="redText"> <?php echo $errors['first_name']; ?>	</div>
				
				<p>Last Name</p>
				<input type="text" class="input-4" name="last_name" id="last_name" placeholder="Enter Last Name" required>
				<div class="redText"> <?php echo $errors['last_name']; ?>	</div>

				<p>Email</p>
				<input type="email" class="input-4" name="email" id="email" placeholder="Enter Email" required>
				<div class="redText"> <?php echo $errors['email']; ?>	</div>

                <p>Nic</p>
				<input type="text" class="input-4" name="nic" id="nic" placeholder="Enter the Nic Number" required>
				<div class="redText"> <?php echo $errors['nic']; ?>	</div>

                <p>Address</p>
				<input type="text" class="input-4" name="address" id="address" placeholder="Enter the Address" required>
				<div class="redText"> <?php echo $errors['address']; ?>	</div>

				<p>Telephone</p>
				<input type="number" class="input-4" name="phone_number" id="phone_number" placeholder="Enter Telephone Number" required>
				<div class="redText"> <?php echo $errors['phone_number']; ?>	</div>

				<p>Password</p>
				<input type="password" class="input-4" name="password" id="password" placeholder="Enter Password" required>
				<div class="redText"> <?php echo $errors['password']; ?>	</div>
                
				<input type="hidden" class="input-4" name="role" id="role" value="4" placeholder="Enter Type" required>
		</div>
		<input type="submit" name="submit" value="Sign Up" class="btn-5">
	</form>
    </div>

</body>
</html>