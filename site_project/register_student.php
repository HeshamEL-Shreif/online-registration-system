<html>
    
    <head>
        
        <title>registered</title>
        
    </head>
    <style>
        
        ul{
            
           position: relative;
            top:18%;
            left:10px;
           
           display: grid;
           grid-template-columns: auto auto auto auto;
            background-color: white;
            padding-left: 50px;
            padding-bottom: 25px;
            padding-top: 20px;
            padding-right: 10px;
            margin-right: 10px;
            margin-left: 20px;
            margin-bottom: 5px;
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
         
            top: 20px;
            
            left:-60px;
            margin-bottom: -124px;
           margin-left: 20px;
           
        }
        
        .dd{
            
            position: relative;
        
         top:5%;
         right: -95%;
         margin-bottom: -50px;
      margin-left: 15px;
          
        }
        
        
        
    </style>
<?php

session_start();
include('db_connection.php');
 include('it_header.php');
$id=$_GET['std'];
$_SESSION['STD_ID']=$id;



$sql = "SELECT * FROM Register AS R , Courses AS C where R.ID='$id' AND R.course_code=C.course_code ";
  
$stmt = sqlsrv_query($conn, $sql);
 while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

     
?>
    <body>
    <ul>
        <li> <?php echo 'Student ID: '. $id ; ?>  </li>
        <li> <?php echo 'Course Name: '. $row["course_name"] ; ?>  </li>
        <li> <?php echo 'Course code: '.$row["course_code"] ; ?>  </li>
        <li> <?php echo 'Credit Hours: '.$row["course_hours"] ; ?>  </li>
        
        <li><img class=" list" src="img/checked.png"></div><br><br></li>
    </ul>
  <a href="delete_register.php?id=<?php echo $row['course_code']?>" ><img class="dd" src="img/delete.png"  width="40" height="40"></a>
<?php }

include ('register_student_footer.php');

?>
<br><br><br><br><br><br><br><br><br> 
    </body>
    
</html>
