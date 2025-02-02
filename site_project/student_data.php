
<html>




    <style>
         ul{
            
            position: fixed;
            top: 28%;
            left:38%;
            background-color: white;
            padding-left: 54px;
            padding-bottom: 30px;
            padding-top: -40px;
            padding-right: 50px;
            border-radius: 25px;
            list-style-type: none;
            align-items: center;
            text-align: center;
            align-content: center;
            z-index: -1;
            
        }
        
        li{
            
            font-family: vag;
            font-size:15px ;
            color: grey;
            font-weight: bold;
            margin-bottom:15px;
            margin-top: 5px;
           
            
        }
        
        
       
        
        .list{
            position: relative;
             width:100px;
           
            display: block;
         
            top: -60px;
            
            left:15%;
            margin-bottom: -50px;
            margin-left: 25px;
        }
        
    </style>

<?php

include('db_connection.php');
 include('header.php');
 
 
$sql9 = "SELECT * FROM students_info WHERE id='$id' ";
$result89 = $conn->query($sql9);

if ($result89->num_rows > 0) {
 
  while($row88 = $result89->fetch_assoc()) {

?>
<head>
	
	
</head><body>

    <ul>
        <li> <img class="card z-depth-0 list" src="img/user.png"><li>
        <li> <?php echo 'Student ID: '. $row88["id"] ; ?>  </li>
        <li> <?php echo 'Student Name: '.$row88["name"] ; ?>  </li>
        <li> <?php echo 'Student Email: '.$row88["email"] ; ?>  </li>
        <li> <?php echo 'Faculty : '.$row88["faculty"] ; ?>  </li>
        <li> <?php echo 'Department: '.$row88["department"] ; ?>  </li>
      
        
    </ul>
       
<?php }} ?>



</body>
        <?php include ('student_info_footer.php'); ?>
        </html>