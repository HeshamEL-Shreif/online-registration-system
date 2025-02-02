<?php

include('db_connection.php');
 $id=$_GET['id'];
 $sql = "DELETE FROM Cart where course_code='$id'";
 $stmt = sqlsrv_query($conn, $sql);
    

    header('location:cart.php');
    ?>
