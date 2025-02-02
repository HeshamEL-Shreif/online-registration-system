<?php

include('db_connection.php');
$id=$_GET['id'];
$sql = "DELETE FROM Room where Room_ID='$id'";
$stmt = sqlsrv_query($conn, $sql);


  
    header('location:room_info.php');
    ?>

