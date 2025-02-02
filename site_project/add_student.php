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
      
      if(isset($_POST['submit'])){
          
          $email=$_POST['email'];
          $w=$_POST['std_name'];
          $pss=$_POST['pass'];
          $sql = "SELECT Email FROM Account WHERE Email = '$email' ";
 
     
     $stmt6 = sqlsrv_query($conn, $sql);
          
          if (sqlsrv_has_rows($stmt6)) {
              
             $errors='This Email Already Exist';
              
          }else if(!preg_match('/^[a-zA-Z0-9\s]+$/', $w)){
              
             $errors='Invalid Name';
              
          }else{
              
              $std_name=$_POST['std_name'];
              $std_password=$_POST['pass'];
              $std_email=$_POST['email'];
              $std_depart=$_POST['dep'];
              $std_SSN=$_POST['ssn'];
              $std_Birth=$_POST['birth'];
              $std_city=$_POST['city'];
              $std_zip=$_POST['zip'];
              $std_street=$_POST['street'];
              $std_BNO=$_POST['BNO'];
              $std_gen=$_POST['gen'];
              $std_phone=$_POST['phone'];

              $sql1 = "INSERT INTO Account (Email,
              Password,
              Type
              ) VALUES( ?, ?, ?)";
              $params1 = array( $std_email, $std_password, 'student');  
              $stmt1 = sqlsrv_query( $conn, $sql1, $params1 );

              $sql = "SELECT * FROM Account";
              
              $stmt = sqlsrv_query($conn, $sql);
               while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                $acc_id=$row['Account_ID'];

               }
                    $acc_id=(int)$acc_id;

                    $dep=$_POST['dep'];
                    $sql = "SELECT * FROM Department WHERE depart_name='$dep' ";
                    $stmt = sqlsrv_query($conn, $sql);
                    while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                     $did=$row['dep_code'];
                    }
                    

              $sql2 = "INSERT INTO Student (
              SName,
              SSN,
              Age,
              city,
              zipcode,
              street_name,
              building_no,
              Gender,
              Account_ID,
              dep_code
              ) 
              VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
              $params2 = array(  $std_name, $std_SSN, $std_Birth, $std_city, $std_zip, $std_street, $std_BNO, $std_gen, $acc_id, $did);  
              $stmt2 = sqlsrv_query( $conn, $sql2, $params2 );
              if ($stmt2) {  
                 
            } else {  
            
                die(print_r(sqlsrv_errors(), true));  
            }  
              
              $sql3 = "SELECT * FROM Student";
              $stmt3 = sqlsrv_query($conn, $sql3);
             while($row1=sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC)){
                $id=$row1['ID'];
             }
                $id=(int)$id;
              $sql4 = "INSERT INTO students_Phone ( 
                Phone, 
                ID) 
                VALUES ( ?, ?)";
              $params4 = array( $std_phone, $id);  
              $stmt4 = sqlsrv_query( $conn, $sql4, $params4);
              if ($stmt4) {  
                 
              } else {  
              
                  die(print_r(sqlsrv_errors(), true));  
              }  
              
                         
              if ( $stmt1 && $stmt2 && $stmt3 && $stmt4 && $stmt )  
{  
    
 
              
                                    ?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/add_student2.php'" />
<?php
}  
          }
          
      }
      
      
     ?>

    <form action="add_student.php"  method="POST">
        
        <label>Student Name:</label>
        <input class="in" type="text" name="std_name" required>
        <label>Student SSN:</label>
        <input class="in" type="text" name="ssn" required>
        <label>Student Age:</label>
        <input class="in" type="number" name="birth" required>
        <label>Student city:</label>
        <input class="in" type="text" name="city" required>
        <label>Student zipcode:</label>
        <input class="in" type="number" name="zip" required>
        <label>Student street name:</label>
        <input class="in" type="text" name="street" required>
        <label>Student Bulding NO. :</label>
        <input class="in" type="number" name="BNO" required>
        <label>Student Gender:</label>
        <input class="in" type="text" name="gen" required>
        <label>Student Email:</label>
        <input class="in" type="email" name="email" required>
        <label>Student Password:</label>
        <input class="in" type="text" name="pass" required>
        <label>Student Phone:</label>
        <input class="in" type="text" name="phone" required>
        <label>Faculties:</label>
        <?php $sql = "SELECT * FROM Faculty";
              
              $stmt = sqlsrv_query($conn, $sql);
        while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){ 
             $fid=$row['Faculty_ID_'];
            $sql2 = "SELECT * FROM Department where Faculty_ID = '$fid'  ";
            $stmt2 = sqlsrv_query($conn, $sql2);
            
            ?>
            <label><?php echo $row['Name']. ' Faculty :' ?></label>
            <?php
            
            while($row2=sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)){
            ?>
               <label><?php echo $row2['depart_name'] ?></label>
        <input class="in2" type="radio" name="dep" value='<?php echo $row2['depart_name'] ?>' required><br>
       <?php
        }}?>
        <div style="color:red"><?php echo $errors; ?></div><br>
        <input class="in2" type="submit" name="submit" value="Save">
        
        
        
    </form>
    
    
    
</html>