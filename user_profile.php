<?php
session_start();
include ('include/conn.php');
$id = $_SESSION['id'];
$user_name=$_SESSION['user_name'];
$email=$_SESSION['email'];
if(empty($id))
{
    header("Location:index.html"); 
}
if(isset($_POST['submit']))
{	$user_name=$_POST['username'];
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
  $salary=$_POST['salary'];


	$query=mysqli_query($conn, "update profile_tbl set user_name='$user_name', f_name='$f_name',l_name='$l_name', phone='$phone', gender='$gender', age='$age', dob='$dob', address='$address',pincode='$pincode',salary='$salary' where email='$email'");
	 ?>
    <script type="text/javascript">
      alert("Profile Updated successfully.")
    </script>
    <?php
      
}


$result=mysqli_query($conn,"select * from profile_tbl where email='$email'");
if($row=mysqli_fetch_row($result))
{
	$f_name=$row[2];
	$l_name=$row[3];
	$phone=$row[5];
	$gender=$row[6];
	$age=$row[7];
	$dob=$row[8];
	$address=$row[9];
	$pincode=$row[10];
  $salary=$row[13];
}  

include "include/header.php";
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
	<div class="alert alert-primary" role="alert">Update / View Profile</div>
	<div class="inputform">
		<form method="post" class="container">
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">User Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="username" value="<?php echo $user_name?>" required>
    			</div>
  			</div>

  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">First Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="f_name" value="<?php echo $f_name;?>" >
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Last Name:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="l_name" value="<?php echo $l_name;?>">
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
    				<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
    			</div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Gender:</label>
    			<div class="col-sm-10">
    				<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if($gender== "Male"){?>checked="true"<?php }?>/>
 			 			<label class="form-check-label" for="inlineRadio1">Male</label>
					</div>

					<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Female" <?php if($gender== "Female"){?>checked="true"<?php }?>/>
 			 			<label class="form-check-label" for="inlineRadio1">Female</label>
					</div>

					<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Other"  <?php if($gender== "Other"){?>checked="true"<?php }?> />
 			 			<label class="form-check-label" for="inlineRadio1">Other</label>
					</div>

    			</div>
  			</div>


  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Age :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="age" value="<?php echo $age;?>">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Date Of Birth :</label>
    			<div class="col-sm-10">
    				<input type="date" class="form-control" name="dob" value="<?php echo $dob;?>" >
    			</div>
  			</div>
  			
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Salary :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="salary" value="<?php echo $salary;?>" >
          </div>
        </div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Address :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="address" value="<?php echo $address;?>" >
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Pincode :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="pincode" value="<?php echo $pincode;?>">
    			</div>
  			</div>

  			<div class="form-group row">
				<button type="submit" class="btn btn-info" name="submit">Update Profile</button>
    			<button type="reset" class="btn btn-warning">Reset</button>
    			<!-- <button type="ok" class="btn btn-info">Reset Password</button>
    			 -->
  			</div>

    	</form>
	</div>

</body>
</html>