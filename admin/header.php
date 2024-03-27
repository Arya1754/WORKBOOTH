<?php 
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lato', sans-serif;
}

body{
    width: 100%;
    height: 100vh;
    position: relative;
}

#ul {
  list-style-type: none;
 /* margin: 0;
  padding: 0;*/
  overflow: hidden;
  background-color:#009aEE;
  height: 55px;
}
#a ,p{
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
}
.open span{
    position: absolute;
    top: 6px;
    left: 35px;
    font-size: 25px;
    line-height: 30px;
    padding: 6px 10px;
    color: white;
    background: #333;
    border-radius: 7px;
    transition: 0.4s;
}
.open span:hover{border-radius: 30px;}

.sidebar{
    width: 250px;
    position: absolute;
    left: -250px;
    top: 0;
    height: 100%;
    background: #333;
    transition: 1s;
    z-index: 1;
}

.sidebar .close span{
    position: absolute;
    top: 5px;
    right: 10px;
    padding: 7px;
    color: white;
    background: #666;
    border-radius: 0px;
    cursor: pointer;
}
.sidebar .close span:hover{color: black;
    background: #fff;}

.sidebar .title{
    padding-left: 60px;
    font-size: 25px;
    line-height: 60px;
    color: white;
    border-bottom: 1px solid gray;
}

.sidebar .links li{
    list-style: none;
    display: block;
    width: 100%;
    line-height: 50px;
    border-left: 5px solid transparent;
    border-bottom: 1px solid #444;
}

.sidebar .links li:hover{
    background: #333;
    border-left: 5px solid cornflowerblue;
}

.sidebar .links li a{
    text-decoration: none;
    color: white;
    font-size: 20px;
    padding-left: 40px;
    transition: 0.5s;
}

.sidebar .links li:hover a{
    color: cornflowerblue;
}

.sidebar .links li a i{
    margin-right: 10px;
}
    </style>
</head>
<body>
    <div class="navigation">
        <ul id="ul">
        <li id="li" style="float:right"><a id="a" href="../include/logout.php">Logout</a></li>
        <li style="float:right"><p>Welcom Admin</p></li>
        </ul>
        <div class="open">
            <span class="fa fa-bars" onclick="openbar()"></span>
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="close">
            <span class="fa fa-times" onclick="closebar()"></span>
        </div>
        <div class="title">
            WorkBooth
        </div>
        <ul class="links">
            <!-- <li><a href="#"><i class="fa fa-home"></i>Home</a></li> -->
            <li><a href="admin_dashbord.php"><i class="fa fa-qrcode"></i>Dashboard</a></li>
            <li><a href="profile.php"><i class="fa fa-info-circle"></i>Profile</a></li>
            <li><a href="add-employee.php"><i class="fa fa-user"></i>Add Employee</a></li>
            <li><a href="view-employee.php"><i class="fa fa-eye"></i>View Employee</a></li>
            <li><a href="manage-leave.php"><i class="fa fa-sign-out"></i>Manage Leave</a></li>
            <li><a href="assign-task.php"><i class="fa fa-briefcase"></i>Assign Task</a></li>
            <li><a href="view-task.php"><i class="fa fa-laptop"></i>View Task</a></li>


            <li><a href="update-password.php"><i class="fa fa-lock"></i>Update Password</a></li>
            <li><a href="../include/logout.php"><i class="fa fa-power-off"></i>Log Out</a></li>
        </ul>
    </div>
    <script >
        function openbar()
        {
        let sidebar = document.getElementById("sidebar");
        sidebar.style.left = "0";
        }

        function closebar()
        {
        let sidebar = document.getElementById("sidebar");
        sidebar.style.left = "-250px";
        }
    </script> 

</body>
</html>
        <!-- <div class="social">
            <i class="fa fa-instagram"></i>
            <i class="fa fa-youtube-play"></i>
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
        </div> -->