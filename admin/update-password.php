<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id))
{
    header("Location: ../index.html"); 
}

if(isset($_POST['submit']))
	{	$oldpwd=$_POST['oldpwd'];
		$newpwd=$_POST['newpwd'];
		$conpwd=$_POST['conpwd'];

		$sql="select password from user_login where id LIKE '".$id ."'";
		$check=mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($check);
		if ($oldpwd == $row[0])
		{
			if ($newpwd == $conpwd)
			{
				$result=mysqli_query($conn,"select password from user_login where password='$newpwd'");
				if(mysqli_num_rows($result)>0)
				{
					?>
					<script type="text/javascript">
					alert("Password alredy existed in database ,please enter unique password")
					</script>
					<?php

				}
				else
				{
				$update=mysqli_query($conn,"update user_login set password ='$newpwd' where id='$id'");
					?>
				<script type="text/javascript">
				alert("Passwords Updated Succesfully")
				</script>
				<?php
				}	
				

			}
			else 
			{
			?>
			<script type="text/javascript">
			alert("Passwords are not matchig")
			</script>
			<?php
			}

		}
		else
		{
			?>
		<script type="text/javascript">
			alert("You'r old password is incorrect!")
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
          Update Password
    </div>

    <div class="inputform">
    <form method="post" class="container">
  <div class="form-group">
    <label >Enter Old Password:</label>
    <input type="password" name="oldpwd" class="form-control" placeholder="Enter Old Password" required>
  </div>
  <div class="form-group">
    <label >Enter New Password:</label>
    <input type="password" class="form-control" name="newpwd" placeholder="Enter newpwdw Password" required>
  </div>
<div class="form-group">
    <label >Conform Password:</label>
    <input type="password" class="form-control" name="conpwd" placeholder="Conform Password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
  <button type="reset"  class="btn btn-primary">Reset</button>
</form>
</div>

	
</body>
</html>