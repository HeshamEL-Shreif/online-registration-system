
<html>
    
    <head>
        
        <title>students info</title>
        
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
         
            top: 18px;
            
            left:-60px;
            margin-bottom: -120px;
           margin-left: 20px;
           
        }
        
      
        
        .dd{
            
            position: relative;
        
         top:-15%;
         right: -95%;
         margin-bottom: -60px;
      margin-left: 15px;
          
        }
        .dd1{
            
            position: relative;
        
         top:-9%;
         right: -92%;
         margin-bottom: -60px;
      margin-left: 15px;
          
        }
        
        .r{
           position: relative;
        
         top:0%;
         right: -89.5%;
         margin-bottom: -60px;
      margin-left: 15px;
          
            
        } 
        
       
        
        
    </style>
<?php

include('db_connection.php');
 include('it_header.php');

 $sql = "SELECT * FROM Student";
  
 $stmt = sqlsrv_query($conn, $sql);
  while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
    $depid=$row['dep_code'];
    $sql1 = "SELECT * FROM Department where dep_code='$depid' ";     
    $stmt1 = sqlsrv_query($conn, $sql1);
   $row1=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC);
   $fid=$row1['Faculty_ID'];
   $sql2 = "SELECT * FROM Faculty where FAculty_ID_='$fid' ";     
    $stmt2 = sqlsrv_query($conn, $sql2);
   $row2=sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC);
   $ii=$row["ID"];
   $sql3 = "SELECT * FROM students_Phone where ID ='$ii' ";     
    $stmt3 = sqlsrv_query($conn, $sql3);
   $row3=sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC);

?>
    <body>
    <ul>
        
        <li> <?php echo 'Name: '. $row["SName"] ; ?>  </li>
        <li> <?php echo 'ID: '.$row["ID"] ; ?>  </li>
        <li> <?php echo 'SSN:'.$row["SSN"] ; ?>  </li>
        <li> <?php echo 'Age : '.$row["Age"] ; ?>  </li>
        <li> <?php echo 'City: '.$row["city"] ; ?>  </li>
        <li> <?php echo 'Zipcode: '.$row["zipcode"] ; ?>  </li>
        <li> <?php echo 'street : '.$row["street_name"] ; ?>  </li>
        <li> <?php echo 'building no.: '.$row["building_no"] ; ?>  </li>
        <li> <?php echo 'Gender: '.$row["Gender"] ; ?>  </li>
        <li> <?php echo 'Faculty: '.$row2["Name"] ; ?>  </li>
        <li> <?php echo 'Department: '.$row1["depart_name"] ; ?>  </li>
        <li> <?php echo 'phone: '.$row3["Phone"] ; ?>  </li>
       

        

        <li><img class=" list" src="img/user.png"></div><br><br></li>
        
    </ul>
       
       
        <a href="delete_student.php?id=<?php echo $row['ID']?>" ><img class="dd" src="img/delete.png"  width="30" height="30"></a>
        <a href="edit_student.php?id=<?php echo $row['ID']?>" ><img class="dd1" src="img/info.png"  width="20" height="20"></a>
        <a style="color:gray" href="register_student.php?std=<?php echo $row['ID']?>" ><img  class="r" src="img/course.png" width="20" height="20"></a>
       
<?php }

include ('students_info_footer.php');
?>
        <br><br><br><br><br><br><br><br><br> 
  </body>

</html>
