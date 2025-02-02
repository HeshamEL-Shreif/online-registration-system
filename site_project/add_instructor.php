<!DOCTYPE html>
<html>
    <style>
        
  
        form{
            
            position: inherit;
            top:180px;
           left: 2%;
            margin-top: 90px;
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
            margin-right: 20px;
            
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
        $pss=$_POST['pass'];
        $sql = "SELECT Email FROM Account WHERE Email = '$email' ";
        $stmt6 = sqlsrv_query($conn, $sql);
          
        if (sqlsrv_has_rows($stmt6)) {
              
             $errors='This Email Already Exist';
              
          }else{
            $name=$_POST['name'];
            $password=$_POST['pass'];
            $email=$_POST['email'];
            $deg=$_POST['deg'];
            $SSN=$_POST['ssn'];
            $Birth=$_POST['birth'];
            $city=$_POST['city'];
            $zip=$_POST['zip'];
            $street=$_POST['street'];
            $BNO=$_POST['BNO'];
            $gen=$_POST['gen'];
            $phone=$_POST['phone'];


            $sql1 = "INSERT INTO Account (Email,
            Password,
            Type
            ) VALUES( ?, ?, ?)";
            $params1 = array( $email, $password, 'instructor');  
            $stmt1 = sqlsrv_query( $conn, $sql1, $params1 );

            $sql = "SELECT * FROM Account";
            
            $stmt = sqlsrv_query($conn, $sql);
             while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
              $acc_id=$row['Account_ID'];

             }
                  $acc_id=(int)$acc_id;

            $sql2 = "INSERT INTO Instructor (Name,
            SSN,
            Age,
            city,
            zipcode,
            street_name,
            building_no,
            Degree,
            Account_ID,
            Gender
            ) 
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
            $params2 = array(  $name, $SSN, $Birth, $city, $zip, $street, $BNO, $deg, $acc_id, $gen);  
            $stmt2 = sqlsrv_query( $conn, $sql2, $params2 );
            if ($stmt2) {  
               
          } else {  
          
              die(print_r(sqlsrv_errors(), true));  
          }  
            
            $sql3 = "SELECT * FROM Instructor";
            $stmt3 = sqlsrv_query($conn, $sql3);
           while($row1=sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC)){
              $id=$row1['ID'];
           }
              $id=(int)$id;
            $sql4 = "INSERT INTO Instructor_Phone ( 
              Phone, 
              ID) 
              VALUES ( ?, ?)";
            $params4 = array( $phone, $id);  
            $stmt4 = sqlsrv_query( $conn, $sql4, $params4);
            if ($stmt4) {  
            } else {  
            
                die(print_r(sqlsrv_errors(), true));  
            }  
            
                       
            if ( $stmt1 && $stmt2 && $stmt3 && $stmt4 && $stmt )  
{   
             
                        ?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/add_instructor2.php'" />
<?php
              
              
          }
          
      }
    }
      
     ?>

<form action="add_instructor.php"  method="POST">
        
        <label>Name:</label>
        <input class="in" type="text" name="name" required>
        <label>SSN:</label>
        <input class="in" type="text" name="ssn" required>
        <label>Age:</label>
        <input class="in" type="number" name="birth" required>
        <label>city:</label>
        <input class="in" type="text" name="city" required>
        <label>zipcode:</label>
        <input class="in" type="number" name="zip" required>
        <label>street name:</label>
        <input class="in" type="text" name="street" required>
        <label>Bulding NO. :</label>
        <input class="in" type="number" name="BNO" required>
        <label>Gender:</label>
        <input class="in" type="text" name="gen" required>
        <label>Email:</label>
        <input class="in" type="email" name="email" required>
        <label>Password:</label>
        <input class="in" type="text" name="pass" required>
        <label>Phone:</label>
        <input class="in" type="text" name="phone" required>
        <label>Degree:</label>
        <input class="in" type="text" name="deg" required>
        <div style="color:red"><?php echo $errors; ?></div><br>
        <input class="in2" type="submit" name="submit" value="Save">
        
        
        
    </form>
    
</html>