<html>
    
    <head>
        
        <title>course info</title>
        
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
            padding-top: 20px;
            padding-right: 50px;
            margin-right: 20px;
            margin-bottom: 20px;
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
         
            top: 26px;
            
            left:-40px;
            margin-bottom: -120px;
           margin-left: 20px;
           
        }
        
      
        
        .dd{
            
            position: relative;
        
         top:1%;
         right: -93%;
         margin-bottom: -50px;
      margin-left: 15px;
          
        }
        
        
        
        
    </style>
<?php

include('db_connection.php');
 include('header_inst.php');

 $sql1 = "SELECT * FROM  section AS SEC , Instructor AS ST , Courses AS CS ,Room AS RM
 WHERE  CS.course_code=SEC.course_code  AND ST.ID='$id' AND SEC.Room_ID=RM.Room_ID";
 
$stmt1 = sqlsrv_query($conn, $sql1);
while($row=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC)){

?>
    <body>
    <ul>
        
        <li> <?php echo 'Name: '. $row["course_name"] ; ?>  </li>
        <li> <?php echo 'Code: '.$row["course_code"] ; ?>  </li>
        <li> <?php echo 'Credit:'.$row["course_hours"] ; ?>  </li>
        <li> <?php echo 'Room: '.$row["Room_num"] ; ?>  </li>
        
        
      
        <li><img class=" list" src="img/course.png" width="30" height="90"></div><br><br></li>
        
    </ul>
       
<?php }

include ('doc_course_footer.php');
?>
        <br><br><br><br><br><br><br><br><br> 
  </body>

</html>
