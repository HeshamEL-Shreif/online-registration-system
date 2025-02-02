<?php

include('db_connection.php');
$id=$_GET['id'];
$sql = "DELETE FROM Department where dep_code='$id'";
$stmt = sqlsrv_query($conn, $sql);


  
    header('location:department_info.php');
    ?>

