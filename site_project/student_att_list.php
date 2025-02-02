
               


<html>
    
    <head>
        
        <title>students list</title>
        
    </head>
    <style>
        
        form{
            
            position: inherit;
            top:300px;
           left: 1%;
            margin-top: 130px;
            text-align: center;
            align-items: center;
            align-content: center;
           font-size: 20px;
           font-family: vag;
          display: block;
     
           
        }
        
        input{
            
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 41%;
               
        }
        label{
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: 12px;
            
        }
       
        
      
        .in{
 

   width: 200px;
    height:30px;
    min-height: 120%;
    
    border-color: white; 
    outline: none;
    border-radius: 25px;
    outline: none;
    padding-left: 30px;
    padding-left: 30px;
    font-family: vag;
    color: #000000;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 1px;
    background-color:white;

}

.in2{
    width: 100px;
    border-radius: 25px;
    height: 50px;
    border: none;
    outline: none;
    padding-left: 10px;
    font-family: vag;
    color: white;
    margin-left: 46%;
    margin-top: 10px;
    font-size: 15px;
    font-weight: bold;
    
    letter-spacing: 2px;
    background-color:#0095f7;

}
        
        
        
    </style>
<?php

session_start();
include('db_connection.php');
include('header_inst.php');
if(isset($_GET['code'])){
  echo $_GET['code'];
 $code=$_GET['code'];
 $_SESSION['cscode']=$code;
}else{
  $code=$_SESSION['cscode'];

}

 
 
 if(isset($_POST['submit'])){
  $sql3 = "SELECT * FROM  section WHERE course_code='$code'";

 $stmt3 = sqlsrv_query($conn, $sql3);


$row3=sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC);
$sql1 = "SELECT * FROM  section AS SEC , Student AS ST , Register AS CA , Courses AS CS, Account AS ACC 
 WHERE SEC.course_code=CA.course_code AND CS.course_code='$code' AND  CS.course_code=SEC.course_code  AND CA.ID=ST.ID AND ACC.Account_ID=ST.Account_ID";
 $_SESSION['course']=$code;
 $stmt1 = sqlsrv_query($conn, $sql1);


 while($row=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC)){
  $id=$row['ID'];
  $sec=$row['Section_ID'];
             
if($_POST[$id]==$id){

  $sql5 = "SELECT * FROM  Attended WHERE  ID='$id' AND Section_ID='$sec' ";
  $stmt5 = sqlsrv_query($conn, $sql5);
  $row5=sqlsrv_fetch_array($stmt5,SQLSRV_FETCH_ASSOC);

  $sql4 = "UPDATE Attended
    SET num_presences=(?)
    WHERE ID='$id' AND Section_ID=' $sec'";
 $params4 = array($row5['num_presences']+1);  
 $stmt4 = sqlsrv_query( $conn, $sql4, $params4);
}else{
  $sql5 = "SELECT * FROM  Attended WHERE  ID='$id' AND Section_ID='$sec' ";
  $stmt5 = sqlsrv_query($conn, $sql5);
  $row5=sqlsrv_fetch_array($stmt5,SQLSRV_FETCH_ASSOC);

  $sql4 = "UPDATE Attended
  SET num_abcence=(?)
  WHERE ID='$id' AND Section_ID=' $sec'";
$params4 = array($row5['num_abcence']+1);  
$stmt4 = sqlsrv_query( $conn, $sql4, $params4);

}

 }
 ?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/doc_att_course.php'" />
 <?php

 }
 

?>
    <body>
    <form action="student_att_list.php"  method="POST">
        
      
        
        <?php $sql1 = "SELECT * FROM  section AS SEC , Student AS ST , Register AS CA , Courses AS CS, Account AS ACC 
 WHERE SEC.course_code=CA.course_code AND CS.course_code='$code' AND  CS.course_code=SEC.course_code  AND CA.ID=ST.ID AND ACC.Account_ID=ST.Account_ID";
 $_SESSION['course']=$code;
 $stmt1 = sqlsrv_query($conn, $sql1);


 while($row=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC)){
             
            ?>
               <label><?php echo $row['SName'] ?></label>
        <input class="in2" type="radio" name="<?php echo $row['ID']?>" value='<?php echo $row['ID'] ?>' ><br>
       <?php
        }?>
        <input class="in2" type="submit" name="submit" value="Save">
        
        
<?php 

include ('stu_att_list_footer.php');
?>
        <br><br><br><br><br><br><br><br><br> 
  </body>

</html>
