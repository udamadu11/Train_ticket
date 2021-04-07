<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Routes Price</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<?php
    
        if(isset($_POST['submit'])){

            $id = $_POST['edit'];
            //Retrive emplyee table data from id
            $selectusers = "SELECT * FROM routes WHERE  id ='$id' ";
            //Performs query on database
            $userquery = mysqli_query($con,$selectusers);
            //Fetch result row as an Associative array
                while($row = mysqli_fetch_assoc($userquery)){
                    //Display employee data by id
                    echo "<div class=\"container\">
                    <form style=\"width:50%;margin-top: 100px;margin-left:300px\" method=\"POST\">
                                <div class=\"alert alert-primary\" role=\"alert\">
                                    <center>Edit Route</center>
                                </div>
                                <div class=\"mb-3\">
                                    <label for=\"from_where\" class=\"form-label\">From</label>
                                    <input type=\"text\" class=\"form-control\" name=\"from_where\" value=\"{$row['from_where']}\" readonly>
                                </div>
                    
                                <div class=\"mb-3\">
                                    <label for=\"to_where\" class=\"form-label\">To</label>
                                    <input type=\"text\" class=\"form-control\" name=\"to_where\" value=\"{$row['to_where']}\" readonly>
                                </div>
                    
                                <div class=\"mb-3\">
                                    <label for=\"price\" class=\"form-label\">Time</label>
                                    <input type=\"text\" class=\"form-control\" name=\"time\" value=\"{$row['time_sc']}\">
                                </div>
                    

                                <input type=\"hidden\" class=\"form-control\" name=\"id\" value=\"{$row['id']}\">
              
                                <button type=\"submit\" class=\"btn btn-primary\" name=\"submit2\" style=\"width:560px\" >Update</button>
                            </form>
                    </div>
                            ";


            }       
             
        }

    ?>



    <?php 
        if (isset($_POST['submit2'])) {
        $id = $_POST['id'];
        $time = $_POST['time'];

        //Edit employee data by employee id
        $EditQuery= "UPDATE routes SET time_sc = '$time' WHERE id = '$id' ";
        $sqlQuery = mysqli_query($con,$EditQuery);
        if ($sqlQuery) {
            echo "<script>alert('Successfuly Upadated...')</script>";
            echo "<script>window.open('viewTimeSchedule.php','_self')</script>";
        }
        else{
            echo "<script>alert('Unsuccessfuly Upadated...')</script>";
            echo "<script>window.open('viewTimeSchedule.php','_self')</script>";
        }
        }
        


    ?>
</body>
</html>
