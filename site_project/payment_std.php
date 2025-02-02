<html>
    
     <style>
        
        .u{
            
            list-style-type: none;
            position: fixed;
            top:230px;
            left:38%;
            text-align: center;
             color: #e49f7f;  
        }
        li{  
            padding-bottom: 30px; 
        }
        li a{
            color: white;
            text-decoration: none;
            background-color: #e49f7f;
           padding-left:10px;
           padding-right: 10px;
           padding-top: 6px;
           padding-bottom: 6px;
           border-radius: 25px;
            font-family: vag;
            font-size: 20px;
        }
        
        
        <?php
include('db_connection.php');
include('header.php');

$pay=mysqli_real_escape_string($conn,$_GET['pay']);
$total=$pay*1200;
?>
    </style>    
    
     <ul class="u">
         <li style="font-size: 45px ">Payment:<?php echo $total; ?> </li><br><br><br>
        <li><a  href="pay.php?paym=<?php echo $total?>">Pay</a></li>
        <li><a href="register_con.php" >Back</a></li>
</ul>
    
    
    
    
</html>
