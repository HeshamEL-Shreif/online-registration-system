<html>
    
    <style>
        
        .u{
            
            list-style-type: none;
            position: fixed;
            top:230px;
            left:38%;
            text-align: center;
             color: #0095f7;  
        }
        li{  
            padding-bottom: 30px; 
        }
        li a{
            color: white;
            text-decoration: none;
            background-color: #0095f7;
           padding-left:10px;
           padding-right: 10px;
           padding-top: 6px;
           padding-bottom: 6px;
           border-radius: 25px;
            font-family: vag;
            font-size: 20px;
        }
    </style>    
<?php
include('db_connection.php');
include('it_header.php');
?>

     <ul class="u">
        <li style="font-size: 45px ">Instructor Added</li><br><br><br>
        <li><a  href="add_instructor.php">Add Instructor</a></li>
        <li><a href="it_home_page.php" >Home</a></li>
</ul>

