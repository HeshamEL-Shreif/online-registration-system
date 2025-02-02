<?php

include('db_connection.php');
$id=$_GET['id'];
$sql = "DELETE FROM Courses where course_code='$id'";
$stmt = sqlsrv_query($conn, $sql);


  
    header('location:course_info.php');
    ?>

