<?php include('include/connection.php') ?><!-- include database connection -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit AccountDetails</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  
</head>
<body>
<?php 
    //Get login user data
      if (isset($_SESSION['role'])) {
           $utype = $_SESSION['role'];
           //select employee data by type
           $selectusers = "SELECT * FROM users WHERE role ='$utype' ";

          $userquery = mysqli_query($con,$selectusers);
          while($row = mysqli_fetch_assoc($userquery)){
            //Form of Owner data
            
            echo " 
            <div id=\"myModal\" class=\"modal fade\" role=\"dialog\">
            <div class=\"modal-dialog\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                  <h4 class=\"modal-title\">Account Details</h4>
                </div>
                <div class=\"modal-body\">

                <form method=\"POST\" class=\"register-form\" id=\"register-form\">
                            <div class=\"form-group\">
                                <input type=\"text\" class=\"form-control\" name=\"first_name\" id=\"first_name\" value=\"{$row['first_name']}\"  required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"text\" class=\"form-control\" name=\"last_name\" id=\"last_name\" value=\"{$row['last_name']}\" required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"email\" class=\"form-control\" name=\"email\" id=\"email\" value=\"{$row['email']}\" required/>
                            </div>
                            <div class=\"form-group\">
                             <input type=\"text\" class=\"form-control\" name=\"nic\" id=\"nic\" value=\"{$row['nic']}\" required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"text\" class=\"form-control\" name=\"address\" id=\"address\" value=\"{$row['address']}\" required/>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"number\" class=\"form-control\" name=\"phone_number\" id=\"phone_number\" value=\"{$row['phone_number']}\" required/>
                            </div> 
                            <input type=\"hidden\" value=" .$row['id']. " name=\"Edit\">
                            <div class=\"form-group form-button\">
                                <input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" class=\"form-submit\" value=\"Update\"/>
                            </div>
                        </form>

                        </div>
                        <div class=\"modal-footer\">
                          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                        </div>
                      </div>
                      </div>
                      </div>
            "; 
          }
        }
        if (isset($_POST['submit'])) {
          $uid = $_POST['Edit'];
          $newFname = $_POST['first_name'];
          $newLname = $_POST['last_name'];
          $newEmail = $_POST['email'];
          $newNic = $_POST['nic'];
          $newAddress = $_POST['address'];
          $newPhone = $_POST['phone_number'];
          //Upadate Owner data by id
          $EditQuery= "UPDATE users SET first_name ='$newFname',last_name = '$newLname',email ='$newEmail',phone_number ='$newPhone',nic ='$newNic' ,address='$newAddress' WHERE id = '$uid' ";
          //Performs a query on databse
          $sqlQuery = mysqli_query($con,$EditQuery);
          if ($sqlQuery) {
              echo "<script>alert('Successfuly Upadated...')</script>";
          }
          else{
              echo "<script>alert('Unsuccessfuly Upadated...')</script>";
          }
          }
            ?>
</body>
</html>