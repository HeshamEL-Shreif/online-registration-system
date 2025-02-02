<?php

include('db_connection.php');
session_start();
 $id=$_GET['id'];
 $std_id=$_SESSION['STD_ID'];
 
 $sql = "DELETE FROM Register where course_code='$id' AND ID='$std_id'";
 
 $stmt = sqlsrv_query($conn, $sql);
 $row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

    header('location:Students_data.php');
    ?>

