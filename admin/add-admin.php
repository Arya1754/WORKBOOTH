<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id))
{
    header("Location: ../index.html"); 
}

if(isset($_POST['submit']))
{
	$adminname = $_POST['adminname'];	
	$emailid = $_POST['emailid'];
	$pwd = $_POST['pwd'];
	$sql="select * from user_login where email LIKE '".$emailid ."'or password
	LIKE'".$pwd."'";
	$check=mysqli_query($conn,$sql);
	if(mysqli_num_rows($check)==0)
	{

	$insert_employee = mysqli_query($conn,"insert into user_login set username='".$adminname."',email='".$emailid."', password='".$pwd."' ,status=1");
	$insert_profile=mysqli_query($conn,"insert into profile_tbl set user_name='".$adminname."',email='".$emailid."', password='".$pwd."' ,status=1"); 

	if($insert_employee > 0 OR $insert_profile > 0)
	{
		?>
		<script type="text/javascript">
			alert("Admin added successfully.")
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("error while adding Admin")
		</script>
		<?php

	}

	}
	else
	{
		?>
		<script type="text/javascript">
			alert("email id alredy exists!")
		</script>
		<?php
	}

}

include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Admin</title>
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
</style>
</head>
<body>
	<div class="alert alert-primary" role="alert">
            Add Admin
    </div>
    <div class="inputform">
    <form method="post" class="container">
  <div class="form-group">
    <label >Enter Admin Name:</label>
    <input type="text" name="adminname" class="form-control" placeholder="Admin name" required>
  </div>
  <div class="form-group">
    <label >Enter Email id:</label>
    <input type="email" class="form-control" name="emailid" placeholder="Email ID" required>
  </div>
<div class="form-group">
    <label >Enter Password:</label>
    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Add</button>
  <button type="reset"  class="btn btn-primary">Reset</button>
</form>
</div>

	
</body>
</html>