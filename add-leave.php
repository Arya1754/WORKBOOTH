<?php
session_start();
include ('include/conn.php');
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.html"); 
}
if(isset($_POST['submit']))
{   $start_date;
    $end_date;
    if(!empty($_POST['start-date']))
    {  
       $start_date =$_POST['start-date'];
    }
    else 
    {
      ?>
    <script>
            alert("Please Enter Start Date");
        </script>
    
    <?php
        
    }    
    if(!empty($_POST['end-date']))
    {   
       $end_date = $_POST['end-date'];
    }
    else 
    {
        ?>
    <script>
            alert("Please Enter End Date");
        </script>
    
    <?php
      
    }   
    
    // $time_period=DATEDIFF($start_date,$end_date) ;
    
    $remark = $_POST['remarks'];

    $insert_leave = mysqli_query($conn,"insert into leave_tbl set user_id='$id',start_date='$start_date', end_date='$end_date', time_period='' , description='$remark'");
    if($insert_leave > 0)
    {
        ?>
<script type="text/javascript">
    alert("Leave added successfully.");
</script>
<?php
 echo "<script>window.location.href='user_dashbord.php'</script>";
}
}

include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="add-leave.css">
    <title>Apply a leave</title>
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
            Apply for Leave
    </div>
    <div class="inputform">
    <form method="post" class="container">
  <div class="form-group">
    <label >Enter Start Date:</label>
    <input type="date" class="form-control" name="start-date"required>
  </div>
  <div class="form-group">
    <label >Enter End Date:</label>
    <input type="date" class="form-control" name="end-date" required>
  </div>
  <div class="form-group">
    <label >Description:</label>
    <textarea name="remarks" class="form-control" rows="3" placeholder="Enter Description" required></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>