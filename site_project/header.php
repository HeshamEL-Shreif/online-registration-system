<!DOCTYPE html>


<?php

session_start();
$id=$_SESSION['student'];
$name=$_SESSION['studentn'];
$_SESSION['totalcre']=0;
?>
<head>
	
	<title>Student View</title>




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
    background-color:#e49f7f;
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
    color: #e49f7f;
    
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
    
    color: #e49f7f;
    z-index: -1;
}




.back{
    
    background-color:#f1f1f1;
    
}

@media screen and (max-width : 1160px){


.logout{
            
    width: 70px;
    height: 50px;
    border: none;
    outline: none;
    padding-left: 10px;
    font-family: vag;
    color: white;
     text-decoration: none;
     width:  110px;
     align-content: right;
      position: fixed;
            top: 14px;
            
            left: 90%;
    
    letter-spacing: 2px;
    background-color:#e49f7f;
            left: 70%;
            



        }

}

    </style>
    </head>
    <body class="back"><div >
<nav>
    
    
	
   
           
    <h2><a class="ab" href="home.php"> Student Campus </a></h2>
                <a href ="login_page.php" class  = "logout z-depth-0">Logout</a>
                <a href ="student_data.php" class  = "welcome ">Welcome <?php echo' '. $name .' ';  ?></a>


	
</nav>
   
</div>



      
    	




