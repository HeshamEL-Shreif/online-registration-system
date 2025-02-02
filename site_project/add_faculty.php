<!DOCTYPE html>
<html>
    <style>
        
  
        form{
            
            position: inherit;
            top:180px;
           left: 1%;
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
            margin-right: 12px;
            
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

        $name=$_POST['name'];
     
        $sql = "SELECT Name FROM Faculty WHERE Name = '$name' ";
        $stmt6 = sqlsrv_query($conn, $sql);
          
        if (sqlsrv_has_rows($stmt6)) {
              
             $errors='This Faculty Already Exist';
              
          }else{
              
              
             $adress=$_POST['address'];
              $city=$_POST['city'];

              $sql1 = "INSERT INTO Faculty (Address,
              city,
              Name
              ) VALUES( ?, ?, ?)";
              $params1 = array( $adress, $city, $name);  
              $stmt1 = sqlsrv_query( $conn, $sql1, $params1 );
              
              ?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/add_faculty2.php'" />
<?php
             
              
          }
          
      }
      
      
     ?>

    <form action="add_faculty.php"  method="POST">
        
        <label>Faculty Name:</label>
        <input class="in" type="text" name="name" required>
       <label>Faculty Address:</label>
        <input class="in" type="text" name="address" required>
        <label>Faculty city:</label>
        <input class="in" type="text" name="city" required>
        <div style="color:red"><?php echo $errors; ?></div><br>
        <input class="in2" type="submit" name="submit" value="Save">
        
        
        
    </form>
    
    
    
</html>