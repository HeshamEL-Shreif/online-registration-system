<!DOCTYPE html>
<html>
    <style>
        
  
        form{
            
            position: relative;
            top:120px;
           left: 2%;
            
            text-align: center;
            align-items: center;
            align-content: center;
           font-size: 20px;
           font-family: vag;
          display: block;
         
           
        }
        
        input{
            
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 41%;
        }
        label{
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: 40px;
        }
       
        
      
        .in{
 

   width: 200px;
    height:30px;
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
    margin-left: 46%;
    margin-top: 10px;
    font-size: 15px;
    font-weight: bold;
    
    letter-spacing: 2px;
    background-color:#0095f7;

}
        
        
    </style>
    
    <?php
    
    $errors='';
    
    session_start();
    
     include('db_connection.php');
     
    include('it_header.php');
     
     if(isset($_GET['id'])){
       $id=$_GET['id'];
       $_SESSION['id']=$id;
     }else{
        $id=$_SESSION['id'];

     }
     $sql7 = "SELECT * FROM Student where ID='$id'";
              $stmt7 = sqlsrv_query($conn, $sql7);
            $row7=sqlsrv_fetch_array($stmt7,SQLSRV_FETCH_ASSOC);
            $acc=$row7['Account_ID'];
            $sql8 = "SELECT * FROM Account where Account_ID='$acc'";
            $stmt8 = sqlsrv_query($conn, $sql8);
          $row8=sqlsrv_fetch_array($stmt8,SQLSRV_FETCH_ASSOC);
          $sql9 = "SELECT * FROM students_Phone where ID='$id'";
          $stmt9 = sqlsrv_query($conn, $sql9);
        $row9=sqlsrv_fetch_array($stmt9,SQLSRV_FETCH_ASSOC);
      
      if(isset($_POST['submit'])){
          
          $email=$_POST['email'];
          $w=$_POST['std_name'];
          $pss=$_POST['pass'];
          if(!preg_match('/^[a-zA-Z0-9\s]+$/', $w)){
              
             $errors='Invalid Name';
              
          }else{
              
              $std_name=$_POST['std_name'];
              $std_password=$_POST['pass'];
              $std_email=$_POST['email'];
              $did=$row7['dep_code'];
              $std_SSN=$_POST['ssn'];
              $std_Birth=$_POST['birth'];
              $std_city=$_POST['city'];
              $std_zip=$_POST['zip'];
              $std_street=$_POST['street'];
              $std_BNO=$_POST['BNO'];
              $std_gen=$_POST['gen'];
              $std_phone=$_POST['phone'];

              $sql1 = " UPDATE Account  set Email=(?),
              Password=(?) where Account_ID='$acc' ";
              $params1 = array( $std_email, $std_password );  
              $stmt1 = sqlsrv_query( $conn, $sql1, $params1 );
                    

              $sql2 = " UPDATE Student SET
              SName=(?) ,
              SSN=(?),
              Age=(?),
              city=(?),
              zipcode=(?),
              street_name=(?),
              building_no=(?),
              Gender=(?)
               WHERE ID='$id' "; 
              $params2 = array(  $std_name, $std_SSN, $std_Birth, $std_city, $std_zip, $std_street, $std_BNO, $std_gen);  
              $stmt2 = sqlsrv_query( $conn, $sql2, $params2 );
              if ($stmt2) {  
                 
            } else {  
            
                die(print_r(sqlsrv_errors(), true));  
            }  
              
              $sql4 = "UPDATE students_Phone 
                 SET Phone=(?), ID=(?)";
              $params4 = array( $std_phone, $id);  
              $stmt4 = sqlsrv_query( $conn, $sql4, $params4);
              if ($stmt4) {  
                 
              } else {  
              
                  die(print_r(sqlsrv_errors(), true));  
              }  
              
                         

              
                                    ?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/Students_data.php'" />
<?php

          }
          
      }
      
      
     ?>

    <form action="edit_student.php"  method="POST">
        
        <label>Student Name:</label>
        <input class="in" type="text" name="std_name" placeholder=<?php echo $row7['SName'] ?> value=<?php echo $row7['SName'] ?> required>
        <label>Student SSN:</label>
        <input class="in" type="text" name="ssn" placeholder=<?php echo $row7['SSN']  ?> value=<?php echo $row7['SSN']?> required>
        <label>Student Age:</label>
        <input class="in" type="number" name="birth" placeholder=<?php echo $row7['Age'] ?> value=<?php echo $row7['Age'] ?> required>
        <label>Student city:</label>
        <input class="in" type="text" name="city" placeholder=<?php echo $row7['city'] ?> value=<?php echo $row7['city'] ?> required>
        <label>Student zipcode:</label>
        <input class="in" type="number" name="zip" placeholder=<?php echo $row7['zipcode'] ?> value=<?php echo $row7['zipcode'] ?> required>
        <label>Student street name:</label>
        <input class="in" type="text" name="street" value=<?php echo $row7['street_name'] ?> required>
        <label>Student Bulding NO. :</label>
        <input class="in" type="number" name="BNO" value=<?php echo $row7['building_no'] ?> required>
        <label>Student Gender:</label>
        <input class="in" type="text" name="gen" value=<?php echo $row7['Gender'] ?> required>
        <label>Student Email:</label>
        <input class="in" type="email" name="email" value=<?php echo $row8['Email'] ?>  required>
        <label>Student Password:</label>
        <input class="in" type="text" name="pass" value=<?php echo $row8['Password'] ?> required>
        <label>Student Phone:</label>
        <input class="in" type="text" name="phone" value=<?php echo $row9['Phone'] ?> required>
        <div style="color:red"><?php echo $errors; ?></div><br>
        <input class="in2" type="submit" name="submit" value="Save">
        
        
        
    </form>
    
    
    
</html>