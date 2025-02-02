<!DOCTYPE html>
<html>
<head>


	<title>Student Grades</title>
</head>

 <style>
        
        ul{
            
            position: fixed;
            top: 26%;
            left:46%;
            background-color: white;
            padding-left: 54px;
            padding-bottom: 30px;
            padding-top: -40px;
            padding-right: 50px;
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
            margin-bottom:15px;
            margin-top: 5px;
            
        }
        
        li a{
            
            text-decoration: none;
            color:white;
           background-color:  #e49f7f ;
            border-radius: 25px;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 10px;
            padding-right: 10px;
            
        }
        
        .list{
            position: relative;
             width:100px;
           
            display: block;
         
            top: -60px;
            
            left:15%;
            margin-bottom: -50px;
        }
        
        
        form{
            
            position:fixed;
            top:25%;
            left:44%;
            text-align: center;
           font-size: 20px;
           font-family: vag;
            
        }
        
        input{
            display: block;
            align-items: center;
            align-content: center;
            margin-top: 18px;
            margin-bottom: 18px;
        }
        
        .in{
 
   
   width: 200px;
    height:40px;
    min-height: 120%;
    
    border-color: white; 
    outline: none;
    border-radius: 25px;
    outline: none;
    padding-left: 30px;
    padding-left: 30px;
    font-family: vag;
    color: #000000;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 1px;
    background-color:white;

}

.in2{
    width: 100px;
    border-radius: 25px;
    height: 50px;
    border: none;
    outline: none;
    padding-left: 10px;
    font-family: vag;
    color: white;
    margin-left: 65px;
    margin-top: 20px;
    font-size: 15px;
    font-weight: bold;
    
    letter-spacing: 2px;
    background-color:#237e67;

}
        
.in:focus{

border: 3px solid #237e67;

}
.in:valid{

    border: 1.5px solid #53ff53;
    
    }

        
    </style>

    
    <?php 
    
    $error=''; 
    session_start();
 include('header_inst.php');
include('db_connection.php');
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $_SESSION['student']=$id;
}else{

    $id=$_SESSION['student'];

}

if(isset($_POST["SetGrade"])){
   

$g =$_POST["Grade"];
$code=$_SESSION['course'];

 $sql4 = "UPDATE Register
    SET Grade=(?)
    WHERE ID='$id' AND course_code='$code'";
 $params4 = array($g);  
 $stmt4 = sqlsrv_query( $conn, $sql4, $params4);
?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/grade_updated.php'" />
<?php

}

 ?>
    
<body>
    <form action="studentgrades.php" method="POST">
        <label for="G">Grade:</label>
        <input class="in" type="Grade"  name="Grade"  required>
        <div style="color:red"><?php echo $error; ?></div><br>
        
        <input class="in2" type="submit" value="Set Grade" name = "SetGrade">

	</form>

</body>

<?php include ('doc_course_footer.php');  ?>
</html>