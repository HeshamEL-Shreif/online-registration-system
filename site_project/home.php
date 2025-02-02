<!DOCTYPE html>
<html>
    
    <style>
        
        
.bg{


height:360px;
width: 100%;
position:fixed;
left:0;
right:0;
top:100px;
z-index: -1;

  
}
ul{
    position: fixed;
    top:445px;
    right: 0;
    
    background-color:white;
    height: 100px;
    width: 100%;
   
     text-align: center;
    align-content: center;
    align-items: center;
    
}


        
li a{
    
    
   
    
    text-align: center;
    align-content: center;
    align-items: center;
    border-radius: 25px;
    border:none;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-top: 10px;
    height: 30px;
    font-family: vag;
    color: white;
    
    
    
    font-size: 19px;
   
   
    letter-spacing: 3px;
    background-color:#e49f7f;
    text-decoration: none;
    

}
li{
    
  margin-left: 60px;
    display:inline;
    align-items: center;
    align-content: center;
   
     
    
    
}
.w{
    
    width: 300px;
    
}
.w1{
    
    width: 200px;
    
}


        
    </style>
    
<head>
	
	
	<title>Home Page</title>
</head>

     <?php include('header.php'); ?>


<div >
    
    <img  class="bg" src="img/wallpaper.jpg" >
</div>



<ul class="z-depth-0"><br><br>

        <li><a href="page1.php" class="w1">Find Course</a></li>
         <li><a href="cart.php" class="w1">View Cart</a></li>
         <li><a href="register_con.php" class="w1">Registered</a></li>
         <li><a  href="grades_std.php" class="w1">Grades</a></li>
        <li><a href="attendance.php" class="w">View Attendance Report</a></li>
</ul>

<?php include ('footer.php'); ?>

</html>