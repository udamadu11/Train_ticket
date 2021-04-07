<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 

	$errors = array('first_name'=>'', 'last_name'=>'', 'email'=>'', 'nic'=>'',  'address'=>'', 'phone_number'=>'', 'nic'=>'', 'password'=>'', 'role'=>'');

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
        if (empty($_POST['role'])) {
			$errors['role'] = 'role is Required';
		}
		}

		else{
			//Insert Query of users add
			$sql = "INSERT INTO users (first_name,last_name,address,email,phone_number,nic,password,role) VALUES ('$first_name','$last_name','$address','$email','$phone_number','$nic','$passwordHash','$role')";
			$sqlResult = mysqli_query($con, $sql);
			//$massage = base64_encode(urlencode("Successfully Added"));
			//header('Location:addUser.php?msg=' .$massage);
			if ($sqlResult) {
            echo "<script>window.open('addUsers.php','_self')</script>";
			}
			exit();
		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Users</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


    <!-- Main css -->
    <link rel="stylesheet" href="../css/signstyle.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Add Users</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="First Name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name"required/>
				                <div class="redText"> <?php echo $errors['first_name']; ?>	</div>
                            </div>
                            <div class="form-group">
                                <label for="Last Name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"required/>
				                <div class="redText"> <?php echo $errors['last_name']; ?>	</div>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"required/>
				                <div class="redText"> <?php echo $errors['email']; ?>	</div>
                            </div>
                            <div class="form-group">
                                <label for="nic"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control" name="nic" id="nic" placeholder="NIC No."required/>
				                <div class="redText"> <?php echo $errors['nic']; ?>	</div>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address"required/>
				                <div class="redText"> <?php echo $errors['address']; ?>	</div>
                            </div>  
                            <div class="form-group">
                                <label for="phone_number"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number"required/>
				                <div class="redText"> <?php echo $errors['phone_number']; ?>	</div>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="role">
                                        <option value="1">Admin</option>
                                        <option value="2">Government</option>
                                        <option value="3">Station Master</option>
                                        <option value="4">Passenger</option>
                                    </select>  
				                <div class="redText"> <?php echo $errors['role']; ?>	</div>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class="form-control" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" class="form-control" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" class="form-submit" value="Add" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../img/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>