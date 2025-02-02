<?php

session_start();
$code=$_SESSION['cca'];
$_SESSION['ccb']=$code;
include('db_connection.php');
 $id=mysqli_real_escape_string($conn,$_GET['id']);
    
  $sql = "UPDATE register SET absence=absence+1 WHERE std_id='$id' and course_code='$code'";

$conn->query($sql);
  
    $conn->close();
    header('location:student_att_list.php');
    ?>
