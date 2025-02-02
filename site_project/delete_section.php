<?php

include('db_connection.php');
$id=$_GET['id'];
$sql = "DELETE FROM section where Section_ID='$id'";
$stmt = sqlsrv_query($conn, $sql);


  
    header('location:section_info.php');
    ?>

