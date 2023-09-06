<?php
	require('include/conn.php');
  session_start();
	if (isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="select * from user_login where binary email='".$email."' AND binary password='".$password."' AND status=0";
		$result=mysqli_query($conn,$sql);

		if (mysqli_num_rows($result)==1)
		{ 
      $_SESSION['IS_LOGIN']='yes';
      $_SESSION['email']=$email;

      $username = mysqli_fetch_row($result);
      $_SESSION['user_name'] =  $username[1]; 
      $_SESSION['id'] = $username[0];


			header('location:user_dashbord.php');
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
	<link rel="stylesheet" type="text/css" href="admin/admin_login.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>LOG IN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <!-- Font Links -->
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
  .alink1  a
      {
      /*width: 150px;
      height: 30px;
      background-color: red;*/
      position: absolute;
      text-decoration: none;
      font-size: 25px;
      color: #a0a0a0;
      top: 176px;
      left: 19em;
      border: 1px solid  #a0a0a0;
      padding:5px 8px 5px 8px;
     border-radius: 10px;
      }
      .alink1 :hover
      {
        color:#5AbBbE ;
        border-color:  #5AbBbE;
      }
</style>
  </head>
  <body>
</head>
<body>
	<div class="aside">
  		<h1>Welcome Back</h1>
      <div class="box">
        <img src="img/abstract.png" width="450">
      </div>
  	</div>
  <div class="container">
  <br>
  <h1>Log in</h1>
  <div class="alink1">
  <a href="admin/admin_login.php">Admin LogIn</a>
  </div>
  <div  class="formdata">
	<form action="login.php" method="POST">
		
		<input type="email" name="email" placeholder="Email" required="required" class="inputarea">
		<br><br>

		<input type="password" name="password" placeholder="Password" required="required" class="inputarea"><br><br>
		<div id="btn">
		<input type="submit" name="login" value="log in" class="inputbtn">
	</div>
	</form>

	</div>
</body>
</html>