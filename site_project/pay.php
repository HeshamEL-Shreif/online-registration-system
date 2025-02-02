<?php

include('db_connection.php');
session_start();
$id=$_SESSION['student'];
 $p=mysqli_real_escape_string($conn,$_GET['paym']);
    
    $sql = "UPDATE students_info SET payment='$p' WHERE id='$id'";
  $conn->query($sql);
    $conn->close();
    header('location:payment2.php');
    ?>
