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
.ul1{
    position: fixed;
    top:545px;
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
    background-color:#0095f7;
    text-decoration: none;
    

}
li{
    
  margin-left: 30px;
    display:inline;
    align-items: center;
    align-content: center;
   
     
    
    
}
.w{
    
    width: 300px;
    
}
.w1{
    
    width: 180px;
    
}


        
    </style>
    
<head>
	
	
	<title>Home Page</title>
</head>

     <?php include('it_header.php'); ?>


<div >
    
    <img  class="bg" src="img/it.jpg" >
</div>



<ul class="z-depth-0"><br><br>

        <li><a href="add_student.php" class="w1">Add student</a></li>
         <li><a href="add_instructor.php" class="w1">Add instructor</a></li>
         <li><a href="add_course.php" class="w1">Add Course</a></li>
         <li><a href="Students_data.php" class="w1">View Students data</a></li>
        <li><a href="instructor_data.php" class="w">View instructor data</a></li>
        <li><a href="course_info.php" class="w1">Courses Data</a></li>
        <li><a href="section_info.php" class="w1">view Section</a></li>
</ul>
<ul class="z-depth-0 ul1"><br><br>

        <li><a href="add_department.php" class="w1">Add Department</a></li>
         <li><a href="add_faculty.php" class="w1">Add Faculty</a></li>
         <li><a href="add_room.php" class="w1">Add Room</a></li>
         <li><a href="add_section.php" class="w1">Add Section</a></li>
        <li><a href="faculty_info.php" class="w">View Faculties</a></li>
        <li><a href="department_info.php" class="w1">view Department</a></li>
        <li><a href="room_info.php" class="w1">view rooms</a></li>
        

</ul>

<?php include ('footer.php'); ?>

</html>