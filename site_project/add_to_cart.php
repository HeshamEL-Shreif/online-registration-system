
<html>
    
    <style>
        
        .u{
            
            list-style-type: none;
            position: fixed;
            top:230px;
            left:38%;
            text-align: center;
             color: #e49f7f;  
        }
        li{  
            padding-bottom: 30px; 
        }
        li a{
            color: white;
            text-decoration: none;
            background-color: #e49f7f;
           padding-left:10px;
           padding-right: 10px;
           padding-top: 6px;
           padding-bottom: 6px;
           border-radius: 25px;
            font-family: vag;
            font-size: 20px;
        }
    </style>    
<?php
include('db_connection.php');
//include('header.php');
     $id=$_GET['id'];
      session_start();
       $st_id=$_SESSION['student'];
       $sql = "SELECT * FROM  section AS SEC , Student AS ST , Courses AS CS , Cart AS CA
       WHERE  CS.course_code=SEC.course_code AND CS.course_code=CA.course_code AND ST.ID='$st_id' AND CS.course_code='$id'  ";
       
      $stmt = sqlsrv_query($conn, $sql);
      $row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

      $sql3 = "SELECT * FROM  section AS SEC , Student AS ST , Courses AS CS 
       WHERE  CS.course_code=SEC.course_code  AND ST.ID='$st_id' AND CS.course_code='$id'  ";
        $stmt3 = sqlsrv_query($conn, $sql3);
        $row3=sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC);

      $sql1 = "SELECT * FROM  section AS SEC , Student AS ST , Courses AS CS , Register AS CA
      WHERE  CS.course_code=SEC.course_code AND CS.course_code=CA.course_code AND ST.ID='$st_id' AND CS.course_code='$id'  ";
      
     $stmt1 = sqlsrv_query($conn, $sql1);
     $row1=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC);

     $sql6 = "SELECT * FROM perquisite 
     WHERE  course_code_1='$id'";
     $num_pre=0;
     $num_pre_reg=0;
    $stmt6 = sqlsrv_query($conn, $sql6);
    while($row6=sqlsrv_fetch_array($stmt6,SQLSRV_FETCH_ASSOC)){
       $num_pre+=1;
       $reg=$row6['perquisite_course_code_2'];

        $sql4 = "SELECT * FROM  section AS SEC , Student AS ST , Courses AS CS , Register AS CA, perquisite AS PA
        WHERE   CS.course_code=SEC.course_code AND CS.course_code=CA.course_code AND ST.ID='$st_id' AND CS.course_code='$reg' AND PA.perquisite_course_code_2=CA.course_code  ";
        $stmt4 = sqlsrv_query($conn, $sql4);
        while($row4=sqlsrv_fetch_array($stmt4,SQLSRV_FETCH_ASSOC)){
            $num_pre_reg+=1;

        }

    }


    

?>
<?php
 if (sqlsrv_has_rows($stmt)) {   
?>
    <ul class="u">
        <li style="font-size: 45px ">Already in Cart</li><br><br><br>
        <li><a  href="page1.php">back to search</a></li>
        <li><a href="cart.php" >view cart</a></li>
</ul>

    <?php
    
}else if($row3['capacity'] == 0){
    
    ?>
    
    
     <ul class="u">
        <li style="font-size: 45px ">No Available Seats </li><br><br><br>
        <li><a  href="page1.php">back to search</a></li>
        <li><a href="cart.php" >view cart</a></li>
</ul>
    <?php
    
}else if(sqlsrv_has_rows($stmt1)){
    
    ?>
    
    
     <ul class="u">
        <li style="font-size: 45px ">Already Registered</li><br><br><br>
        <li><a  href="page1.php">back to search</a></li>
        <li><a href="cart.php" >view cart</a></li>
</ul>
    
<?php }else if($num_pre!=$num_pre_reg){
    
    ?>
    
    
     <ul class="u">
        <li style="font-size: 45px ">Finish prerequesite First</li><br><br><br>
        <li><a  href="page1.php">back to search</a></li>
        <li><a href="cart.php" >view cart</a></li>
</ul>
    
<?php }else{ 
    
    $sql3 = "INSERT INTO Cart (ID,
    course_code
    ) VALUES( ?, ?)";
    $params1 = array( $st_id, $id);  
    $stmt3 = sqlsrv_query( $conn, $sql3, $params1 );
    if($stmt3){
?> 
     <ul class="u">
        <li style="font-size: 45px ">Added To Cart</li><br><br><br>
        <li><a  href="page1.php">back to search</a></li>
        <li><a href="cart.php" >view cart</a></li>
</ul>
<?php } }?>  
</html>