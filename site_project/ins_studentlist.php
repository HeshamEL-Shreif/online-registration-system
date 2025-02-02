
               


<html>
    
    <head>
        
        <title>students list</title>
        
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
             width:60px;
           
            display: block;
         
            top: 18px;
            
            left:-45px;
            margin-bottom: -120px;
           margin-left: 20px;
           
        }
        
      
        
        .dd{
            
            position: relative;
        
         top:7%;
         right: -93%;
         margin-bottom: -50px;
      margin-left: 15px;
          
        }
        
        .r{
           position: relative;
        
         top:3%;
         right: -91%;
         margin-bottom: -50px;
      margin-left: 15px;
          
            
        } 
        
       
        
        
    </style>
<?php

include('db_connection.php');
include('header_inst.php');
 $code=$_GET['code'];
 $sql1 = "SELECT * FROM  section AS SEC , Student AS ST , Register AS CA , Courses AS CS, Account AS ACC 
 WHERE SEC.course_code=CA.course_code AND CS.course_code='$code' AND  CS.course_code=SEC.course_code  AND CA.ID=ST.ID AND ACC.Account_ID=ST.Account_ID";
  session_start();
 $_SESSION['course']=$code;
 $stmt1 = sqlsrv_query($conn, $sql1);
 while($row=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC)){
 

?>
    <body>
    <ul>
        
        <li> <?php echo 'Name: '. $row["SName"] ; ?>  </li>
        <li> <?php echo 'ID: '.$row["ID"] ; ?>  </li>
        <li> <?php echo 'Email:'.$row["Email"] ; ?>  </li>
        <li><img class=" list" src="img/user.png"></div><br><br></li>
        
    </ul> 
      
    <a href="studentgrades.php?id=<?php echo $row["ID"] ?>" ><img class="dd" src="img/info.png"  width="30" height="30"></a>
       
<?php }

include ('Student_list_footer.php');
?>
        <br><br><br><br><br><br><br><br><br> 
  </body>

</html>
