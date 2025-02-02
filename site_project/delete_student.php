<?php

include('db_connection.php');
 $id=$_GET['id'];
 $sql = "SELECT * FROM Student where ID='$id'";
  
 $stmt = sqlsrv_query($conn, $sql);
$row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
$accid=$row['Account_ID'];
$sql = "DELETE FROM Account where Account_ID='$accid'";
 $stmt = sqlsrv_query($conn, $sql);



    header('location:Students_data.php');
    ?>
