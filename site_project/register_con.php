<html>
    
    <head>
        
        <title>registered</title>
        
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
            padding-bottom: 25px;
            padding-top: 25px;
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
             width:100px;
           
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
 session_start();
 $st_id=$_SESSION['student'];
 $sql1 = "SELECT * FROM  section AS SEC , Student AS ST , Courses AS CS , Register AS CA,Instructor AS INS,Room AS RM
      WHERE SEC.ID=INS.ID  AND SEC.Room_ID=RM.Room_ID AND CS.course_code=SEC.course_code AND CS.course_code=CA.course_code AND ST.ID='$st_id'  ";
      
     $stmt1 = sqlsrv_query($conn, $sql1);
     while($row=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC)){
?>
    <body>
    <ul>
        
        <li> <?php echo 'Course Name: '. $row["course_name"] ; ?>  </li>
        <li> <?php echo 'Course code: '.$row["course_code"] ; ?>  </li>
        <li> <?php echo 'Credit Hours: '.$row["course_hours"] ; ?>  </li>
        <li> <?php echo 'Instructor: '.$row["Name"]  ?>  </li>
        <li> <?php echo 'Room: '.$row["Room_num"]  ?>  </li>
        <li><img class=" list" src="img/checked.png"></div><br><br></li>
    </ul>

<?php }

include ('register_footer.php');

?>
<br><br><br><br><br><br><br><br><br> 
    </body>
    
</html>