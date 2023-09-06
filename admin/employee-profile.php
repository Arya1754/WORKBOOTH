<?php
session_start();
include ('../include/conn.php');

$viewid=$_GET['viewid'];
$result=mysqli_query($conn,"select * from profile_tbl where email='$viewid'");
if($row=mysqli_fetch_row($result))
{ $user_name=$row[1];
	$f_name=$row[2];
	$l_name=$row[3];
  $email=$row[4];
	$phone=$row[5];
	$gender=$row[6];
	$age=$row[7];
	$dob=$row[8];
	$address=$row[9];
	$pincode=$row[10];
  $salary=$row[13];
}  

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
	.alert
        {
            margin-left: 10px;
            margin-right:10px;
        }
     .btn
     {
     	width: 20%;
     	padding: 5px;
     	margin-right: 20px;
     	font-size: 20px;
     }
    .inputform
    {  
        background-color: #cfcfcf;
        font-size: 21px;
        margin:0% 1% ;
        width: 98%;
        border-radius: 8px;
    }
    .container
    {
        padding:50px 0px;
    }
    table tr td
    {
    	padding-top: 10px;
    }
</style>
</head>
<body>
	<div class="alert alert-primary" role="alert">Update / View Profile</div>
	<div class="inputform">
		<form method="post" class="container">
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">User Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="username" value="<?php echo $user_name?>"  readonly="true">
    			</div>
  			</div>

  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">First Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="f_name" value="<?php echo $f_name;?>"  readonly="true">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Last Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="l_name" value="<?php echo $l_name;?>"  readonly="true">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Email :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" readonly="true">
    			</div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Contact number :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>"  readonly="true">
    			</div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Gender:</label>
    			<div class="col-sm-10">
    				<div class="form-check form-check-inline">
              <input type="text" name="gender" class="form-control"  readonly="true" value="
              <?php 
              switch($gender)
              {
                case "Male";
                echo "Male";
                break;
                case "Female";
                echo "Female";
                break;
                case "Other";
                echo "Other";
                break;
              }
              ?>">
					</div>
    			</div>
  			</div>


  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Age :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="age" value="<?php echo $age;?>"  readonly="true">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Date Of Birth :</label>
    			<div class="col-sm-10">
    				<input type="date" class="form-control" name="dob" value="<?php echo $dob;?>"  readonly="true">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Address :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="salary" value="<?php echo $salary;?>"  readonly="true">
    			</div>
  			</div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Address :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="address" value="<?php echo $address;?>"  readonly="true">
          </div>
        </div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Pincode :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="pincode" value="<?php echo $pincode;?>"  readonly="true">
    			</div>
  			</div>

  			<div class="form-group row">
    			<input type="submit" class="btn btn-warning" name="submit" value="Go Back">
  			</div>
        <?php if(isset($_POST['submit']))
         echo "<script>window.location.href='view-employee.php'</script>";
        ?>

    	</form>
	</div>

</body>
</html>