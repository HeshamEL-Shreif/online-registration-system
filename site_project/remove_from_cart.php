<?php

include('db_connection.php');

session_start();
$id=$_SESSION['student'];
$sql = "DELETE FROM Cart where ID='$id'";
 $stmt = sqlsrv_query($conn, $sql);

header('location:cart.php');

?>
