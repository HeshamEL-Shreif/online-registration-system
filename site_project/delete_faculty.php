<?php

include('db_connection.php');
$id=$_GET['id'];
$sql = "DELETE FROM Faculty where Faculty_ID_='$id'";
$stmt = sqlsrv_query($conn, $sql);


  
    header('location:faculty_info.php');
    ?>

