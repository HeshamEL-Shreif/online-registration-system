
<!DOCTYPE html>
<html class="bg">
<?php


include ('login_template.php');
include('db_connection.php');
session_start();


  $errors='';
  
  
if(isset($_POST['login'])){
    
    
     $em= $_POST['email'];
     $pa=   $_POST['password'];
     
     $sql = "SELECT * FROM Account WHERE Email='$em' AND PAssword='$pa'";
 
     
     $stmt = sqlsrv_query($conn, $sql);
  $row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
            
           
 
     if($em ==$row['Email'] && $pa == $row['Password']) 
            { 
                $_POST['logged_in'] = true; 
                if($row['Type']=='it'){
                   $id=$row['Account_ID'];
                   $sql1 = "SELECT * FROM IT where Account_ID = $id";
                    $stmt1 = sqlsrv_query( $conn, $sql1);
                    $row1 = sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC);
                    $_SESSION['insid']=$row1['ID'];
                    $_SESSION['insn']=$row1['Name'];
                    header('location:it_home_page.php');
                }elseif($row['Type']=='instructor'){
                    $id=$row['Account_ID'];
                    $sql1 = "SELECT Name,ID FROM Instructor where Account_ID=$id";
                    $stmt1 = sqlsrv_query( $conn, $sql1);
                    $row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC);
                    $_SESSION['insid']=$row1['ID'];
                    $_SESSION['insn']=$row1['Name'];
                    header('location:instructor_home.php');
                }elseif($row['Type']=='student'){
                    $id=$row['Account_ID'];
                    $sql1 = "SELECT * FROM Student where Account_ID='$id' ";
                    $stmt1 = sqlsrv_query( $conn, $sql1);
                    $row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC);
                    $_SESSION['student']=$row1['ID'];
                    $_SESSION['studentn']=$row1['SName'];
                    header('location:home.php');
                }else{
                    $errors='invalid email or password';
                }
               
            }else{
                
                $errors='invalid email or password';
                
            }
}

?>
   
<head>
   
    
<title>university</title>

</head>
<body class="ct1">
    <br><br>
    <h1>login</h1>

    <form action="login_page.php" method="POST">
<div >
    <div>
       
        <label for="email">Please Enter Your Email</label>
        </div><div><br>
        <input class="in" type="email" name="email" required>
        </div>
        <div><br><br><br>
    <label for="password">Please Enter Your Password</label><br><br>
    <input class="in" type="password" name="password" required>
    
        </div>
    <div ><br><br><br>
        
        <div style="color:red"><?php echo $errors; ?></div><br>
        
    <input class="in2" name="login" type="submit" value="login">
</div>
 </form>
</body>

</html>