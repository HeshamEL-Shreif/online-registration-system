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
        
         top:10%;
         right: -95%;
         margin-top: -60px;
      margin-left: 15px;
          
        }
        
        
        
        
    </style>
<?php

include('db_connection.php');
 include('it_header.php');

 $sql = "SELECT * FROM section AS SEC , Courses AS CS, Faculty AS FC , Department AS DP, Room AS RM 
 WHERE SEC.course_code=CS.course_code AND SEC.Room_ID=RM.Room_ID AND CS.dep_code=DP.dep_code AND DP.Faculty_ID=FC.Faculty_ID_";
  
 $stmt = sqlsrv_query($conn, $sql);
  while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
?> 
    <body>
    <ul>
        
        <li> <?php echo 'Name: '. $row["course_name"] ; ?>  </li>
        <li> <?php echo 'Code: '.$row["course_code"] ; ?>  </li>
        <li> <?php echo 'Credit:'.$row["course_hours"] ; ?>  </li>
        <li> <?php echo 'Department: '.$row["depart_name"] ; ?>  </li>
         <li> <?php echo 'Faculty: '.$row["Name"] ; ?>  </li>
         <li> <?php echo 'semester:'.$row["semester"] ; ?>  </li>
         <li> <?php echo 'room: '.$row["Room_num"] ; ?>  </li>
         <li> <?php echo 'Capacity: '.$row["capacity"] ; ?>  </li>
        
        
      
        <li><img class=" list" src="img/course.png" width="30" height="90"></div><br><br></li>
        
    </ul>
        <a href="delete_section.php?id=<?php echo $row['Section_ID']?>" ><img class="dd" src="img/delete.png"  width="40" height="40"></a>
       
<?php }

include ('section_info_footer.php');
?>
        <br><br><br><br><br><br><br><br><br> 
  </body>

</html>
