
<html>
    
    <head>
        
        <title>cart</title>
        
    </head>
    <style>
        
     ul{
            
           position: relative;
            top:12%;
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
         
            top: 18px;
            
            left:-54px;
            margin-bottom: -120px;
           margin-left: 20px;
           
        }
        
      
        
        .dd{
            
            position: relative;
        
         top:-2%;
         right: -95%;
         margin-bottom: -50px;
      margin-left: 15px;
          
        }
        
        
        
    </style>
<?php

include('db_connection.php');
 include('header.php');
session_start();
 $st_id=$_SESSION['student'];
       $sql = "SELECT * FROM  section AS SEC , Student AS ST , Courses AS CS , Cart AS CA , Instructor AS INS
       WHERE  CS.course_code=SEC.course_code AND CS.course_code=CA.course_code AND ST.ID=CA.ID AND ST.ID='$st_id' AND INS.ID=SEC.ID ";
       
      $stmt = sqlsrv_query($conn, $sql);
      while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

?>
    <body>
    <ul>
        
        <li> <?php echo 'Course Name: '. $row["course_name"] ; ?>  </li>
        <li> <?php echo 'Course code: '.$row["course_code"] ; ?>  </li>
        <li> <?php echo 'Credit Hours: '.$row["course_hours"] ; ?>  </li>
        <li> <?php echo 'Instructor: '.$row["Name"] ; ?>  </li>
      
        <li><img class=" list" src="img/cart.png"></div><br><br></li>
        
    </ul>
       <a href="delete_from_cart.php?id=<?php echo $row['course_code']?>" ><img class="dd" src="img/delete.png"  width="40" height="40"></a>
<?php }

include ('cart_footer.php');
?>
       <br><br><br><br><br><br><br><br><br> 
  </body>

</html>
