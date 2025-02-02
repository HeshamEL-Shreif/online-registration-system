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
    background-color:#237e67;
    text-decoration: none;
    

}
li{
    
  margin-left: 40px;
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

     <?php include('header_inst.php'); ?>


<div >
    
    <img  class="bg" src="img/prof.jpg" >
</div>



<ul class="z-depth-0"><br><br>

        <li><a href="doc_course_data.php" class="w1">View Students</a></li>
         <li><a href="ins_course_info.php" class="w1">Grades</a></li>
         <li><a href="doc_att_course.php" class="w1">Attendance</a></li>
        <li><a href="course_list.php" class="w">courses</a></li>
       
</ul>

<?php include ('footer.php'); ?>

</html>

