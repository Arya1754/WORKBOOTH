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
	$title=$_POST['title'];
	$description=$_POST['description'];
	$assignto=$_POST['assignto'];
	$startdate=$_POST['startdate'];
	$duedate=$_POST['duedate'];

	$result=mysqli_query($conn,"insert into work_tbl set user_id='$assignto',title='$title',description='$description',startdate='$startdate',duedate='$duedate',status=0");
  ?>
  <script type="text/javascript">
    alert("Task Added Succesfully")
  </script>
  <?php

}

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Assign Task</title>
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
        margin:0% 1%;
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
	<div class="alert alert-primary" role="alert">Assign Task</div>

	<div class="inputform">
    <form method="post" class="container">
  <div class="form-group">
    <label >Title :</label>
    <input type="text" name="title" class="form-control" placeholder="Task Title" required>
  </div>
  <div class="form-group">
    <label >Description :</label>
    <input type="text" class="form-control" name="description" placeholder="Task Description" required>
  </div>

  <div class="form-group">
    <label >Assigned to:</label>
    <?php $sql=mysqli_query($conn,"select id,username from user_login where status=0");?>	
  	<select class="form-select form-control" name="assignto">
  		<option value="">Select Employee...</option>
      <?php while($row = mysqli_fetch_array($sql))
      {
        echo "<option value='".$row['id']."'>".$row['username']."</option>";

      }?>



    	<!-- <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option> -->
	</select>
  </div>
<div class="form-group">
    <label >Start date:</label>
    <input type="date" class="form-control" name="startdate" required>
  </div>
<div class="form-group">
    <label >Due date:</label>
    <input type="date" class="form-control" name="duedate" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Add</button>
  <button type="reset"  class="btn btn-primary">Reset</button>
</form>
</div>

	
</body>
</html>	