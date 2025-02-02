<!DOCTYPE html>


<?php

session_start();
$id=$_SESSION['insid'];
$name=$_SESSION['insn'];

?>
<head>
	
	<title>it View</title>




 <style>
        
 
        .logout{
           
            position:fixed;
           
           left: 1400px;
         width: 100px;
         align-content: center;
         align-items: center;
         text-align: center;
         top:30px;
         height: 28px;
         border-radius: 25px;
        border: none;
    outline: none;
    padding-top: 6px;
    padding-bottom: 6px;
    font-family: vag;
    color: white;
    
    font-size: 20px;
    font-weight: bold;
    
    letter-spacing: 2px;
    background-color:#0095f7;
    text-decoration: none;
      z-index: 2;
        }
         .welcome{
           
            position:fixed;
           
           left: 20px;
         width: 200px;
         align-content: center;
         align-items: center;
         text-align: center;
         top:30px;
         height: 28px;
         border-radius: 25px;
        border: none;
    outline: none;
    padding-top: 6px;
    padding-bottom: 6px;
    font-family: vag;
    color: #0095f7;
    
    font-size: 20px;
    font-weight: bold;
    
    letter-spacing: 2px;
    background-color:white;
    text-decoration: none;
 z-index: 2;
        }
        
h2{
        

   position: fixed;
   height: 90px;
    background-color:white;
    width: 100%;
    top: -18px;
   left:0;
   text-align: center;
    
   padding-top: 22px;
    font-size: 20px;
    z-index: 1;
}



.ab{
     
    font-size: 40px;
    font-weight: bold;
    letter-spacing: 1px;
     text-align: center;
     text-decoration: none;
    font-family: vag;
    
    color: #0095f7;
    z-index: -1;
}




.back{
    
    background-color:#f1f1f1;
    
}



    </style>
    </head>
    <body class="back"><div >
<nav>
    
    
	
   
           
    <h2><a class="ab z-depth-0" href="it_home_page.php"> Student Campus </a></h2>
                <a href ="login_page.php" class  = "logout ">Logout</a>
                <a href ="#" class  = "welcome z-depth-0">Welcome<?php echo ' '.$name.' ';  ?></a>

</h2>
	
</nav>
   
</div>



