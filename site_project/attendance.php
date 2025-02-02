<html>
    
    <head>
        
        <title>Attended</title>
        
    </head>
    <style>
        
      ul{
            
           position: relative;
            top:18%;
            left:20px;
           
           display: grid;
           grid-template-columns: auto auto auto auto;
            background-color: white;
            padding-left: 30px;
            padding-bottom: 20px;
            padding-top: 15px;
            padding-right: 50px;
            margin-right: 20px;
            border-radius: 25px;
            list-style-type: none;
            align-items: center;
            text-align: center;
            z-index: -1;
            
        }
        
        li{
            
            font-family: vag;
            font-size:15px ;
            color: grey;
            font-weight: bold;
            margin-bottom: 14px;
            margin-top: 10px;
            
            
        }
        .list{
            position: absolute;
             width:80px;
           
            display: block;
         
            top: 18px;
            
            left:-54px;
            margin-bottom: -120px;
           margin-left: 20px;
           
        }
        
        
        
        
        
    </style>
<?php

include('db_connection.php');
 include('header.php');
 $sql1 = "SELECT * FROM  section AS SEC , Student AS ST , Register AS CA ,Instructor AS INS, Attended AS ATT
WHERE   SEC.course_code=CA.course_code AND ST.ID='$id' AND INS.ID=SEC.ID  AND ATT.ID=ST.ID AND ATT.Section_ID=SEC.Section_ID";
 
$stmt1 = sqlsrv_query($conn, $sql1);
while($row=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC)){

?>
    <body>
    <ul>
        <li> <?php echo 'Course code: '.$row["course_code"] ; ?>  </li>
        <li> <?php echo 'Instructor: '.$row["Name"] ; ?>  </li>
        <li> <?php echo 'Abscence: '.$row["num_abcence"] ; ?>  </li>
        <li><img class=" list" src="img/attendance.png"></div><br><br></li>
    </ul>

<?php }
?>
<br><br><br>
<?php
include ('footer2.php');
?>
