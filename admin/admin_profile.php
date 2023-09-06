<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
$user_name=$_SESSION['euser_name'];
$email=$_SESSION['eemail'];
$result=mysqli_query($conn,"select * from profile_tbl where email='$email'");

if($row=mysqli_fetch_row($result))
{
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
    .inputform
    {
        background-color: #ddd;
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
	<div class="alert alert-primary" role="alert">
            Update / View Profile
    </div>
    <div class="inputform">




    	<form method="post" class="container">
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">User Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="username" value="<?php echo $user_name?>" >
    			</div>
  			</div>

  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">First Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="fname" value="" >
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Last Name:</label>
    			<div class="col-sm-10">
    				<input type="password" class="form-control">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Email :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" value="">
    			</div>
  			</div>

  			gender

  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Age :</label>
    			<div class="col-sm-10">
    				<input type="password" class="form-control">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Date Of Birth :</label>
    			<div class="col-sm-10">
    				<input type="password" class="form-control">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Addres</label>
    			<div class="col-sm-10">
    				<input type="password" class="form-control">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Pincode</label>
    			<div class="col-sm-10">
    				<input type="password" class="form-control">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    			<div class="col-sm-10">
    				<input type="password" class="form-control" id="inputPassword" placeholder="Password">
    			</div>
  			</div>
  		
    	</form>
    </div>
</body>
</html>	