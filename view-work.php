<?php
session_start();
include ('include/conn.php');
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location:index.html"); 
}
if (isset($_GET['workid']))
{       
    $workid=$_GET['workid'];
    $date = date('Y-m-d');
    $sql=mysqli_query($conn,"update work_tbl set status=1,enddate='$date' where id='$workid'");
    echo "<script>window.location.href='view-work.php'</script>";
            
}

include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Tasks</title>
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
    <div class="alert alert-primary" role="alert" style="">View Tasks</div>
    <div class="tbl">
    <table class="table">
        <thead class="thead-dark">
            <tr>
             <th scope="col">S.No.</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Start Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Submit Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_query = mysqli_query($conn, "select * from work_tbl where user_id='$id'");
            $sn = 1;
            while($row = mysqli_fetch_array($select_query))
            { 
            ?>
            <tr>
                <td ><?php echo $sn; ?></td>

                <td ><?php echo $row['title']; ?></td>
                
                <td ><?php echo $row['description']; ?></td>

                <td ><?php echo $row['startdate']; ?></td>

                <td ><?php echo $row['duedate']; ?></td>

                <td ><?php if($row['status']==0){echo "-";} else{echo $row['enddate'] ;}?></td>

                <td >
                    <?php if($row['status']==0){?><a href="view-work.php?workid=<?php echo $row['id']?>">Done</a><?php }else{echo "<span style='color:green'>Completed</span>";}?>
                </td>

            </tr>
            <?php $sn++; } ?>                                                   
        </tbody>
    </table>        
</div>
</body>
</html>