<?php 
include('db_connection.php');

session_start();
       $st_id=$_SESSION['student'];
       
       $sql = "SELECT * FROM  section AS SEC , Student AS ST , Courses AS CS , Cart AS CA , Instructor AS INS
       WHERE  CS.course_code=SEC.course_code AND CS.course_code=CA.course_code AND ST.ID=CA.ID AND ST.ID='$st_id' AND INS.ID=SEC.ID ";
       
      $stmt = sqlsrv_query($conn, $sql);
      while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

    $id=$row['course_code'];
       $sql3 = "INSERT INTO Register (ID,
       course_code,
       Grade
       ) VALUES( ?, ?, ?)";
       $params1 = array( $st_id, $id, 0);  
       $stmt3 = sqlsrv_query( $conn, $sql3, $params1 );
       $sql4 = "INSERT INTO Attended (ID,
       Section_ID
       ) VALUES(  ?, ?)";
       $params2 = array( $st_id, $row['Section_ID']);  
       $stmt4 = sqlsrv_query( $conn, $sql4, $params2 );
       $sec_id=$row['Section_ID'];
       $sql2 = " UPDATE section SET
       capacity=(?)
        WHERE Section_ID='$sec_id' "; 
       $params3 = array( $row['capacity']-1);  
       $stmt2 = sqlsrv_query( $conn, $sql2, $params3 );


      }

$sql = "DELETE FROM Cart where ID='$st_id'";
 $stmt = sqlsrv_query($conn, $sql);



header('location:register_con.php');
?>
