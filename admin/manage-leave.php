<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id))
{
    header("Location:../index.php"); 
}

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Leave</title>
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
        a button{padding: 4px;}
    </style>
</head>
<body>
   <div class="alert alert-primary" role="alert" style="">Manage Leave</div>
    <div class="tbl">
    <table class="table">
        <thead class="thead-dark">
            <tr>
             <th scope="col">S.No.</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Leave Start Date</th>
            <th scope="col">Leave End Date</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
      <?php
      $select_query = mysqli_query($conn, "select leave_tbl.* , user_login.username from leave_tbl inner join user_login on user_login.id=leave_tbl.user_id where user_login.status=0");
      $sn = 1;
          while($row = mysqli_fetch_array($select_query))
          { 
          $startdate = date('d M Y', strtotime($row['start_date']));
          $enddate = date('d M Y', strtotime($row['end_date']));
          //$timeperiod = $row['time_period'];
          ?>
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $startdate; ?></td>
            <td><?php echo $enddate; ?></td>
            <td><?php echo  $row['description']; ?></td>
            <?php 
            if($row['status']==0)
            { ?>
            <td style="text-align: center"> <a href="approve-leave.php?id=<?php echo $row['id']; ?>"><button>Approve</button></a>
            <a href="reject-leave.php?id=<?php echo $row['id']; ?>"><button>Reject</button></a> </td>
            <?php } 
            else if($row['status']==1) { ?>
            <td style="color:green; font-weight: 700;text-align: center">Approved</td>
            <?php }
            else
            { ?>
            <td style="color:Red; font-weight: 700;text-align: center">Rejected</td>
            <?php  }
            ?>
          </tr>
          <?php $sn++; } ?>
      </tbody>
    </table>        
</div>              
</body>
</html>