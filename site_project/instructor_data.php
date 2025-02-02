<html>
    
    <head>
        
        <title>instructor info</title>
        
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
         
            top: 18px;
            
            left:-54px;
            margin-bottom: -120px;
           margin-left: 20px;
           
        }
        
      
        
        .dd{
            
            position: relative;
        
         top:-6%;
         right: -95%;
         margin-bottom: -50px;
      margin-left: 15px;
          
        }
        
        
        
    </style>
<?php

include('db_connection.php');
 include('it_header.php');
 $sql = "SELECT * FROM Instructor AS INS , Instructor_Phone AS IP , Account AS ACC WHERE INS.ID=IP.ID AND INS.Account_ID=ACC.Account_ID";
  
 $stmt = sqlsrv_query($conn, $sql);
  while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

?>
    <body>
    <ul>
        
        <li> <?php echo 'Name: '. $row["Name"] ; ?>  </li>
        <li> <?php echo 'ID: '.$row["ID"] ; ?>  </li>
        <li> <?php echo 'SSN:'.$row["SSN"] ; ?>  </li>
        <li> <?php echo 'Age : '.$row["Age"] ; ?>  </li>
        <li> <?php echo 'City: '.$row["city"] ; ?>  </li>
        <li> <?php echo 'Zipcode: '.$row["zipcode"] ; ?>  </li>
        <li> <?php echo 'street : '.$row["street_name"] ; ?>  </li>
        <li> <?php echo 'building no.: '.$row["building_no"] ; ?>  </li>
        <li> <?php echo 'Gender: '.$row["Gender"] ; ?>  </li>
        <li> <?php echo 'Degree: '.$row["Degree"] ; ?>  </li>
        <li> <?php echo 'phone: '.$row["Phone"] ; ?>  </li>
        <li> <?php echo 'Email: '.$row["Email"] ; ?>  </li>
       

        

        <li><img class=" list" src="img/user.png"></div><br><br></li>
        
    </ul>
        <a href="delete_instructor.php?id=<?php echo $row['ID']?>" ><img class="dd" src="img/delete.png"  width="40" height="40"></a>
       
<?php }

include ('instructor_info_footer.php');
?>
        <br><br><br><br><br><br><br><br><br> 
       

  </body>

</html>
