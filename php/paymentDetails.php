<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php 

	$errors = array('card_no'=>'', 'mm'=>'', 'yy'=>'', 'cvCode'=>'');

	if(isset($_POST['submit'])){ 
		$card_no=$_POST['card_no'];
		$mm=$_POST['mm'];
		$yy=$_POST['yy'];
        $cvCode=$_POST['cvCode'];

		if (empty($_POST['card_no'])||empty($_POST['mm'])||empty($_POST['yy'])||empty($_POST['cvCode'])) {
			
		if (empty($_POST['card_no'])) {
			$errors['card_no'] = 'Card Number is Required';
		}

		if (empty($_POST['mm'])) {
			$errors['mm'] = 'Month is Required';
		}

		if (empty($_POST['yy'])) {
			$errors['yy'] = 'Year is Required';
		}

		if (empty($_POST['cvCode'])) {
			$errors['yy'] = 'cv Code is Required';
		}
		}

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

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-left:400;margin-top:200px">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method='POST'>
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" name="card_no" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-6">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" name="mm" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" name="yy" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="text" class="form-control" id="cvCode" name="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span></span> Add Payment Details</a>
                </li>
            </ul>

        </div>
    </div>
</div>

