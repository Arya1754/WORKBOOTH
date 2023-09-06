<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id))
{
    header("Location: ../index.html"); 
}
if(isset($_GET['delid']))
  {
    $employeeid=$_GET['delid'];
    $query=mysqli_query($conn,"DELETE user_login,profile_tbl FROM user_login INNER JOIN
    profile_tbl ON profile_tbl.email = user_login.email WHERE user_login.email='$employeeid'");
    echo "<script>alert('Record Deleted successfully');</script>";
    echo "<script>window.location.href='view-employee.php'</script>";
  }

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Employee</title>
    <style type="text/css">
        .table
        {  
        margin:0% 1% ;
        width: 98%;
        border: 1px solid #bbb;
        }
        .alert
        {
        margin-left: 10px;
        margin-right:10px;
        }
        th,tr{text-align: center}
    </style>
</head>
<body>
    <div class="alert alert-primary" role="alert" style="">View Employees</div>
    <div class="tbl">
    <table class="table">
        <thead class="thead-dark">
            <tr>
             <th scope="col">S.No.</th>
            <th scope="col">User Name</th>
            <th scope="col">EmailID</th>
            <th scope="col">Date</th>
            <th scope="col">Action  </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_query = mysqli_query($conn, "select * from user_login where status=0");
            $sn = 1;
            while($row = mysqli_fetch_array($select_query))
            { 
            ?>
            <tr>
                <td ><?php echo $sn; ?></td>

                <td ><?php echo $row['username']; ?></td>
                
                <td ><?php echo $row['email']; ?></td>

                <td ><?php echo $row['date']; ?></td>
                <td><h5>
                    <a href="employee-profile.php?viewid=<?php echo $row['email'];?>"  style="color:blue">Info</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="view-employee.php?delid=<?php echo $row['email'];?>"  style="color: red" onclick="return confirm('Do you really want to delete');">Delete</a></h5></td>
            </tr>
            <?php $sn++; } ?>                                                   
        </tbody>
    </table>        
</div>
</body>
</html>