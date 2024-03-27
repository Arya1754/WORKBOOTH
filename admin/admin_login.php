<?php
	require('../include/conn.php');
	session_start();
	if (isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="select * from user_login where binary email='".$email."' AND binary password='".$password."' AND status=1";
		$result=mysqli_query($conn,$sql);

		if (mysqli_num_rows($result)==1)
		{	$_SESSION['IS_ELOGIN']='yes';
			$_SESSION['eemail']=$email;

			$username = mysqli_fetch_row($result);
    		$_SESSION['euser_name'] =  $username[1]; 
   			$_SESSION['eid'] = $username[0];


			header('location:admin_dashbord.php');
			die();
		}
		else
		{ ?>
    <script>
            alert("You have entered wrong emailid or password.");
        </script>
    
    <?php
        
    }

	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="admin_login.css">
	<link rel="stylesheet" type="text/css" href="../login.css">
	<title>ADMIN LOG IN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <!-- Font Links -->
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
</style>
  </head>
  <body>
</head>
<body>
	<div class="aside">
  		<h1>Welcome Back</h1>
      <div class="box">
        <img src="../img/abstract.png" width="450">
      </div>
  	</div>
  <div class="container">
  <br>
  <h1>Admin Log in</h1>
  <div  class="formdata">
	<form action="admin_login.php" method="POST">
		
		<input type="email" name="email" placeholder="Email" required="required" class="inputarea">
		<br><br>

		<input type="password" name="password" placeholder="Password" required="required" class="inputarea"><br><br>
		<div id="btn">
		<input type="submit" name="login" value="log in" class="inputbtn">
	</div>
	</form>

	</div>

</div>
</body>
</html>